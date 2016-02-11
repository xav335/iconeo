<?php
	class WpFastestCacheCreateCache extends WpFastestCache{
		public $options = array();
		public $cdn;
		private $startTime;
		private $blockCache = false;
		private $err = "";
		private $cacheFilePath = "";

		public function __construct(){
			//to fix: PHP Notice: Undefined index: HTTP_USER_AGENT
			$_SERVER['HTTP_USER_AGENT'] = isset($_SERVER['HTTP_USER_AGENT']) && $_SERVER['HTTP_USER_AGENT'] ? strip_tags($_SERVER['HTTP_USER_AGENT']) : "Empty User Agent";
			
			$this->options = $this->getOptions();

			$this->checkActivePlugins();

			$this->set_cdn();

			$this->set_cache_file_path();
		}

		public function set_cache_file_path(){

			if($this->isMobile()){
				if(class_exists("WpFcMobileCache") && isset($this->options->wpFastestCacheMobileTheme)){
					$wpfc_mobile = new WpFcMobileCache();
					$this->cacheFilePath = $this->getWpContentDir()."/cache/".$wpfc_mobile->get_folder_name()."".$_SERVER["REQUEST_URI"];
				}
			}else{
				$this->cacheFilePath = $this->getWpContentDir()."/cache/all".$_SERVER["REQUEST_URI"];

				// qTranslate: in name.com/de REQUEST_URI is "/" instead of "/de" so need to check it
				if(isset($_SERVER["HTTP_COOKIE"]) && $_SERVER["HTTP_COOKIE"]){
					if(preg_match("/qtrans/i", $_SERVER["HTTP_COOKIE"])){
						if(isset($_SERVER["REDIRECT_URL"]) && $_SERVER["REDIRECT_URL"]){
							$this->cacheFilePath = $this->getWpContentDir()."/cache/all".$_SERVER["REDIRECT_URL"];
						}
					}
				}
			}

			$this->cacheFilePath = $this->cacheFilePath ? rtrim($this->cacheFilePath, "/")."/" : "";

		}

		public function set_cdn(){
			$cdn_values = get_option("WpFastestCacheCDN");
			if($cdn_values){
				$std = json_decode($cdn_values);

				$std->originurl = trim($std->originurl);
				$std->originurl = trim($std->originurl, "/");
				$std->originurl = preg_replace("/http(s?)\:\/\/(www\.)?/i", "", $std->originurl);

				$std->cdnurl = trim($std->cdnurl);
				$std->cdnurl = trim($std->cdnurl, "/");
				$std->cdnurl = preg_replace("/http(s?)\:\/\/(www\.)?/i", "", $std->cdnurl);
				$this->cdn = $std;
			}
		}

		public function checkActivePlugins(){
			//for WP-Polls
			if($this->isPluginActive('wp-polls/wp-polls.php')){
				require_once "wp-polls.php";
				$wp_polls = new WpPollsForWpFc();
				$wp_polls->execute();
			}
		}

		public function checkShortCode($content){
			if(preg_match("/\[wpfcNOT\]/", $content)){
				if(!is_home() || !is_archive()){
					$this->blockCache = true;
				}
				$content = str_replace("[wpfcNOT]", "", $content);
			}
			return $content;
		}

		public function createCache(){
			if(isset($this->options->wpFastestCacheStatus)){

				if(isset($this->options->wpFastestCacheLoggedInUser) && $this->options->wpFastestCacheLoggedInUser == "on"){
					// to check logged-in user
					foreach ((array)$_COOKIE as $cookie_key => $cookie_value){
						if(preg_match("/comment_author_|wordpress_logged_in|wp_woocommerce_session/i", $cookie_key)){
							return 0;
						}
					}
				}

				if(isset($_SERVER['REQUEST_URI']) && preg_match("/(\/){2}$/", $_SERVER['REQUEST_URI'])){
					return 0;
				}

				if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
					return 0;
				}

				if(preg_match("/^https/i", get_option("home")) && !is_ssl()){
					//Must be secure connection
					return 0;
				}

				if(!preg_match("/^https/i", get_option("home")) && is_ssl()){
					//must be normal connection
					return 0;
				}

				if(preg_match("/www\./", get_option("home")) && !preg_match("/www\./", $_SERVER['HTTP_HOST'])){
					return 0;
				}

				if(!preg_match("/www\./", get_option("home")) && preg_match("/www\./", $_SERVER['HTTP_HOST'])){
					return 0;
				}

				// http://mobiledetect.net/ does not contain the following user-agents
				if(preg_match("/Nokia309|Casper_VIA/i", $_SERVER['HTTP_USER_AGENT'])){
					return 0;
				}

				//to show cache version via php if htaccess rewrite rule does not work
				if($this->cacheFilePath && file_exists($this->cacheFilePath."index.html")){
					if($content = @file_get_contents($this->cacheFilePath."index.html")){
						$content = $content."<!-- via php -->";
						die($content);
					}
				}else{
					$create_cache = false;

					if($this->isMobile()){
						if(class_exists("WpFcMobileCache") && isset($this->options->wpFastestCacheMobileTheme)){
							$create_cache = true;

							// wptouch: ipad is accepted as a desktop so no need to create cache if user agent is ipad 
							// https://wordpress.org/support/topic/plugin-wptouch-wptouch-wont-display-mobile-version-on-ipad?replies=12
							if($this->isPluginActive('wptouch/wptouch.php') || $this->isPluginActive('wptouch-pro/wptouch-pro.php')){
								if(preg_match("/ipad/i", $_SERVER['HTTP_USER_AGENT'])){
									$create_cache = false;
								}
							}
						}
					}else{
						$create_cache = true;
					}

					if($create_cache){
						$this->startTime = microtime(true);
						add_action( 'get_footer', array($this, "wp_print_scripts_action"));
						ob_start(array($this, "callback"));
					}
				}
			}
		}

		public function wp_print_scripts_action(){
			echo "<!--WPFC_FOOTER_START-->";
		}

		public function ignored($buffer){
			$list = array(
						"\/wp\-comments\-post\.php",
						"\/sitemap\.xml",
						"\/wp\-login\.php",
						"\/robots\.txt",
						"\/wp\-cron\.php",
						"\/wp\-content",
						"\/wp\-admin",
						"\/wp\-includes",
						"\/index\.php",
						"\/xmlrpc\.php",
						"\/wp\-api\/",
						"leaflet\-geojson\.php",
						"\/clientarea\.php"
					);
			if($this->isPluginActive('woocommerce/woocommerce.php')){
				if(preg_match("/page-id-(\d+)/", $buffer, $page_id)){
					if(function_exists("wc_get_page_id")){
						$woocommerce_ids = array();
						
						array_push($woocommerce_ids, wc_get_page_id('cart'), wc_get_page_id('checkout'), wc_get_page_id('receipt'), wc_get_page_id('confirmation'), wc_get_page_id('product'));

						if (in_array($page_id[1], $woocommerce_ids)) {
							return true;
						}
					}
				}

				array_push($list, "\/cart", "\/checkout", "\/receipt", "\/confirmation", "\/product", "\/wc-api\/");
			}

			if(preg_match("/".implode("|", $list)."/i", $_SERVER["REQUEST_URI"])){
				return true;
			}

			return false;
		}

		public function exclude_page(){
			$preg_match_rule = "";
			$request_url = trim($_SERVER["REQUEST_URI"], "/");

			if($json_data = get_option("WpFastestCacheExclude")){
				$std = json_decode($json_data);

				foreach((array)$std as $key => $value){
					if(isset($value->prefix) && $value->prefix){
						$value->content = trim($value->content);
						$value->content = trim($value->content, "/");

						if($value->prefix == "homepage"){
							if($request_url == "/" || $request_url == ""){
								return true;
							} 
						}else if($value->prefix == "exact"){
							if(strtolower($value->content) == strtolower($request_url)){
								return true;	
							}
						}else{
							if($value->prefix == "startwith"){
								$preg_match_rule = "^".preg_quote($value->content, "/");
							}else if($value->prefix == "contain"){
								$preg_match_rule = preg_quote($value->content, "/");
							}

							if(preg_match("/".$preg_match_rule."/i", $request_url)){
								return true;
							}
						}
					}
				}

			}
			return false;
		}

		public function is_xml($buffer){
			if(preg_match("/^\s*\<\?xml/i", $buffer)){
				return true;
			}
			return false;
		}

		public function callback($buffer){
			$buffer = $this->checkShortCode($buffer);

			if(preg_match("/Mediapartners-Google|Google\sWireless\sTranscoder/i", $_SERVER['HTTP_USER_AGENT'])){
				return $buffer;
			}else if($this->exclude_page()){
				return $buffer."<!-- Wp Fastest Cache: Exclude Page -->";
			}else if($this->is_xml($buffer)){
				return $buffer;
			}else if (is_user_logged_in() || $this->isCommenter()){
				return $buffer;
			} else if(isset($_SERVER["HTTP_ACCEPT"]) && preg_match("/json/i", $_SERVER["HTTP_ACCEPT"])){
				return $buffer;
			}else if(isset($_COOKIE["wptouch-pro-view"])){
				return $buffer."<!-- \$_COOKIE['wptouch-pro-view'] has been set -->";
			}else if($this->checkWoocommerceSession()){
				if($this->checkHtml($buffer)){
					return $buffer;
				}else{
					return $buffer."<!-- \$_COOKIE['wp_woocommerce_session'] has been set -->";
				}
			}else if(defined('DONOTCACHEPAGE') && $this->isPluginActive('wordfence/wordfence.php')){ // for Wordfence: not to cache 503 pages
				return $buffer."<!-- DONOTCACHEPAGE is defined as TRUE -->";
			}else if($this->isPasswordProtected($buffer)){
				return $buffer."<!-- Password protected content has been detected -->";
			}else if($this->isWpLogin($buffer)){
				return $buffer."<!-- wp-login.php -->";
			}else if($this->hasContactForm7WithCaptcha($buffer)){
				return $buffer."<!-- This page was not cached because ContactForm7's captcha -->";
			}else if(is_404()){
				return $buffer;
			}else if($this->ignored($buffer)){
				return $buffer;
			}else if($this->blockCache === true){
				return $buffer."<!-- wpfcNOT has been detected -->";
			}else if(isset($_GET["preview"])){
				return $buffer."<!-- not cached -->";
			}else if(preg_match("/\?/", $_SERVER["REQUEST_URI"]) && !preg_match("/\/\?fdx\_switcher\=true/", $_SERVER["REQUEST_URI"])){ // for WP Mobile Edition
				return $buffer;
			}else if($this->checkHtml($buffer)){
				return $buffer."<!-- html is corrupted -->";
			}else{				
				$content = $buffer;

				if(isset($this->options->wpFastestCacheCombineCss)){
					require_once "css-utilities.php";
					$css = new CssUtilities($this, $content);
					$content = $css->combineCss();
					unset($css);
				}else if(isset($this->options->wpFastestCacheMinifyCss)){
					require_once "css-utilities.php";
					$css = new CssUtilities($this, $content);
					$content = $css->minifyCss();
					unset($css);
				}

				if(isset($this->options->wpFastestCacheCombineJs) || isset($this->options->wpFastestCacheMinifyJs) || isset($this->options->wpFastestCacheCombineJsPowerFul)){
					require_once "js-utilities.php";
				}

				if(isset($this->options->wpFastestCacheCombineJs)){
					$head_new = "";

					$r = explode("<head", $content);

				    if (isset($r[1])){
				        $r = explode("</head>", $r[1]);
				        $head_new = $r[0];
				    }

				    if($head_new){
						if(isset($this->options->wpFastestCacheMinifyJs) && $this->options->wpFastestCacheMinifyJs){
							$js = new JsUtilities($this, $head_new, true);
						}else{
							$js = new JsUtilities($this, $head_new);
						}

						$tmp_head = $js->combine_js();

						$content = str_replace($head_new, $tmp_head, $content);

						unset($r);
						unset($js);
						unset($tmp_head);
						unset($head_new);
				    }
				}

				if(class_exists("WpFastestCachePowerfulHtml")){
					$powerful_html = new WpFastestCachePowerfulHtml();
					$powerful_html->set_html($content);

					if(isset($this->options->wpFastestCacheCombineJsPowerFul) && method_exists("WpFastestCachePowerfulHtml", "combine_js_in_footer")){
						if(isset($this->options->wpFastestCacheMinifyJs) && $this->options->wpFastestCacheMinifyJs){
							$content = $powerful_html->combine_js_in_footer($this, true);
						}else{
							$content = $powerful_html->combine_js_in_footer($this);
						}
					}
					
					if(isset($this->options->wpFastestCacheRemoveComments)){
						$content = $powerful_html->remove_head_comments();
					}

					if(isset($this->options->wpFastestCacheMinifyHtmlPowerFul)){
						$content = $powerful_html->minify_html();
					}

					if(isset($this->options->wpFastestCacheMinifyJs) && method_exists("WpFastestCachePowerfulHtml", "minify_js_in_body")){
						$content = $powerful_html->minify_js_in_body($this);
					}
				}

				if($this->err){
					return $buffer."<!-- ".$this->err." -->";
				}else{
					$content = $this->cacheDate($content);
					$content = $this->minify($content);
					
					if($this->cdn){
						$content = preg_replace_callback("/(srcset|src|href)\=[\'\"]([^\'\"]+)[\'\"]/i", array($this, 'cdn_replace_urls'), $content);
						// url()
						$content = preg_replace_callback("/(url)\(([^\)]+)\)/i", array($this, 'cdn_replace_urls'), $content);
					}

					if(isset($this->options->wpFastestCacheRenderBlocking) && method_exists("WpFastestCachePowerfulHtml", "render_blocking")){
						$content = $powerful_html->render_blocking($content);
					}

					
					$content = str_replace("<!--WPFC_FOOTER_START-->", "", $content);

					if($this->cacheFilePath){
						$this->createFolder($this->cacheFilePath, $content);
					}
					
					return $buffer."<!-- need to refresh to see cached version -->";
				}
			}
		}

		public function cdn_replace_urls($matches){
			$this->cdn->file_types = str_replace(",", "|", $this->cdn->file_types);

			if(preg_match("/\.(".$this->cdn->file_types.")/i", $matches[0])){
				if(preg_match("/".preg_quote($this->cdn->originurl, "/")."/", $matches[2])){
					$matches[0] = preg_replace("/(http(s?)\:)?\/\/(www\.)?".preg_quote($this->cdn->originurl, "/")."/i", "//".$this->cdn->cdnurl, $matches[0]);
				}else if(preg_match("/^(\/?)(wp-includes|wp-includes)/", $matches[2])){
					$matches[2] = preg_replace("/^\//", "", $matches[2]);
					$matches[0] = str_replace($matches[2], "//".$this->cdn->cdnurl."/".$matches[2], $matches[0]);
				}
			}

			return $matches[0];
		}

		public function minify($content){
			$content = preg_replace("/<\/html>\s+/", "</html>", $content);
			$content = str_replace("\r", "", $content);
			return isset($this->options->wpFastestCacheMinifyHtml) ? preg_replace("/^\s+/m", "", ((string) $content)) : $content;
		}

		public function checkHtml($buffer){
			if(preg_match('/<html[^\>]*>/si', $buffer) && preg_match('/<body[^\>]*>/si', $buffer)){
				return false;
			}
			// if(strlen($buffer) > 10){
			// 	return false;
			// }

			return true;
		}

		public function cacheDate($buffer){
			if($this->isMobile() && class_exists("WpFcMobileCache")){
				$comment = "<!-- Mobile: WP Fastest Cache file was created in ".$this->creationTime()." seconds, on ".date("d-m-y G:i:s")." ".$_SERVER['HTTP_USER_AGENT']."-->";
			}else{
				$comment = "<!-- WP Fastest Cache file was created in ".$this->creationTime()." seconds, on ".date("d-m-y G:i:s")." ".$_SERVER['HTTP_USER_AGENT']."-->";
			}

			if(defined('WPFC_REMOVE_FOOTER_COMMENT') && WPFC_REMOVE_FOOTER_COMMENT){
				return $buffer;
			}else{
				return $buffer.$comment;
			}
		}

		public function creationTime(){
			return microtime(true) - $this->startTime;
		}

		public function isCommenter(){
			$commenter = wp_get_current_commenter();
			return isset($commenter["comment_author_email"]) && $commenter["comment_author_email"] ? true : false;
		}
		public function isPasswordProtected($buffer){
			if(preg_match("/action\=[\'\"].+postpass.*[\'\"]/", $buffer)){
				return true;
			}

			foreach($_COOKIE as $key => $value){
				if(preg_match("/wp\-postpass\_/", $key)){
					return true;
				}
			}

			return false;
		}

		public function createFolder($cachFilePath, $buffer, $extension = "html", $prefix = "", $gzip = false){
			$create = false;
			
			if($buffer && strlen($buffer) > 100 && $extension == "html"){
				$create = true;
			}

			if(($extension == "css" || $extension == "js") && $buffer && strlen($buffer) > 5){
				$create = true;
				$buffer = trim($buffer);
				if($extension == "js"){
					if(substr($buffer, -1) != ";"){
						$buffer .= ";";
					}
				}
			}

			$cachFilePath = urldecode($cachFilePath);

			if($create){
				if (!is_user_logged_in() && !$this->isCommenter()){
					if(!is_dir($cachFilePath)){
						if(is_writable($this->getWpContentDir()) || ((is_dir($this->getWpContentDir()."/cache")) && (is_writable($this->getWpContentDir()."/cache")))){
							if (@mkdir($cachFilePath, 0755, true)){

								file_put_contents($cachFilePath."/".$prefix."index.".$extension, $buffer);

								if(defined("WPFC_GZIP_FOR_COMBINED_FILES") && WPFC_GZIP_FOR_COMBINED_FILES){
									if($gzip){
										if(in_array($extension, array("css", "js"))){
											$zp = gzopen($cachFilePath."/".$prefix."index.".$extension.".gz", "w9");
											gzwrite($zp, $buffer);
											gzclose($zp);
										}
									}
								}
		
								
								if(class_exists("WpFastestCacheStatics")){

									if(preg_match("/wpfc\-mobile\-cache/", $cachFilePath)){
										$extension = "mobile";
									}
									
					   				$cache_statics = new WpFastestCacheStatics($extension, strlen($buffer));
					   				$cache_statics->update_db();
				   				}

							}else{
							}
						}else{

						}
					}else{
						if(file_exists($cachFilePath."/".$prefix."index.".$extension)){

						}else{

							file_put_contents($cachFilePath."/".$prefix."index.".$extension, $buffer);
							
							if(class_exists("WpFastestCacheStatics")){
								
								if(preg_match("/wpfc\-mobile\-cache/", $cachFilePath)){
									$extension = "mobile";
								}

				   				$cache_statics = new WpFastestCacheStatics($extension, strlen($buffer));
				   				$cache_statics->update_db();
			   				}
						}
					}
				}
			}elseif($extension == "html"){
				$this->err = "Buffer is empty so the cache cannot be created";
			}
		}

		public function replaceLink($search, $replace, $content){
			$href = "";

			if(stripos($search, "<link") === false){
				$href = $search;
			}else{
				preg_match("/.+href=[\"\'](.+)[\"\'].+/", $search, $out);
			}

			if(count($out) > 0){
				$content = preg_replace("/<link[^>]+".preg_quote($out[1], "/")."[^>]+>/", $replace, $content);
			}

			return $content;
		}

		public function isMobile(){
			if(preg_match("/.*".$this->getMobileUserAgents().".*/i", $_SERVER['HTTP_USER_AGENT'])){
				return true;
			}else{
				return false;
			}
		}
		public function isPluginActive( $plugin ) {
			return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) || $this->isPluginActiveForNetwork( $plugin );
		}
		public function isPluginActiveForNetwork( $plugin ) {
			if ( !is_multisite() )
				return false;

			$plugins = get_site_option( 'active_sitewide_plugins');
			if ( isset($plugins[$plugin]) )
				return true;

			return false;
		}

		public function checkWoocommerceSession(){
			foreach($_COOKIE as $key => $value){
			  if(preg_match("/^wp\_woocommerce\_session/", $key)){
			  	return true;
			  }
			}

			return false;
		}

		public function isWpLogin($buffer){
			// if(preg_match("/<form[^\>]+loginform[^\>]+>((?:(?!<\/form).)+)user_login((?:(?!<\/form).)+)user_pass((?:(?!<\/form).)+)<\/form>/si", $buffer)){
			// 	return true;
			// }
			if($GLOBALS["pagenow"] == "wp-login.php"){
				return true;
			}

			return false;
		}

		public function hasContactForm7WithCaptcha($buffer){
			if(is_single() || is_page()){
				if(preg_match("/<input[^\>]+_wpcf7_captcha[^\>]+>/i", $buffer)){
					return true;
				}
			}
			
			return false;
		}
	}
?>