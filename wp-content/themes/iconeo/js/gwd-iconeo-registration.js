/**
 * SOCIAL NETWORKS* SOCIAL NETWORKS* SOCIAL NETWORKS* SOCIAL NETWORKS* SOCIAL NETWORKS* SOCIAL NETWORKS
 * * SOCIAL NETWORKS* SOCIAL NETWORKS* SOCIAL NETWORKS* SOCIAL NETWORKS* SOCIAL NETWORKS* SOCIAL NETWORKS
 */

	gwd.actions.events.registerEventHandlers = function(event) {
        gwd.actions.events.addHandler('facebook', 'mouseover', gwd.auto_FacebookMouseover, false);
        gwd.actions.events.addHandler('facebook', 'mouseout', gwd.auto_FacebookMouseout, false);
        gwd.actions.events.addHandler('twiter', 'mouseover', gwd.auto_TwiterMouseover, false);
        gwd.actions.events.addHandler('twiter', 'mouseout', gwd.auto_TwiterMouseout, false);
        gwd.actions.events.addHandler('googgle', 'mouseover', gwd.auto_GoogleMouseover, false);
        gwd.actions.events.addHandler('googgle', 'mouseout', gwd.auto_GoogleMouseout, false);
        gwd.actions.events.addHandler('facebook', 'click', gwd.faceclick, false);
        gwd.actions.events.addHandler('twiter', 'click', gwd.twitclick, false);
        gwd.actions.events.addHandler('googgle', 'click', gwd.googleclick, false);
        gwd.actions.events.addHandler('viadeo', 'click', gwd.viadeoclick, false);
        gwd.actions.events.addHandler('linkedin', 'click', gwd.linkclick, false);
        gwd.actions.events.addHandler('viadeo', 'mouseover', gwd.auto_ViadeoMouseover, false);
        gwd.actions.events.addHandler('viadeo', 'mouseout', gwd.auto_ViadeoMouseout, false);
        gwd.actions.events.addHandler('linkedin', 'mouseover', gwd.auto_LinkedinMouseover, false);
        gwd.actions.events.addHandler('linkedin', 'mouseout', gwd.auto_LinkedinMouseout, false);
      };
      gwd.actions.events.deregisterEventHandlers = function(event) {
        gwd.actions.events.removeHandler('facebook', 'mouseover', gwd.auto_FacebookMouseover, false);
        gwd.actions.events.removeHandler('facebook', 'mouseout', gwd.auto_FacebookMouseout, false);
        gwd.actions.events.removeHandler('twiter', 'mouseover', gwd.auto_TwiterMouseover, false);
        gwd.actions.events.removeHandler('twiter', 'mouseout', gwd.auto_TwiterMouseout, false);
        gwd.actions.events.removeHandler('googgle', 'mouseover', gwd.auto_GoogleMouseover, false);
        gwd.actions.events.removeHandler('googgle', 'mouseout', gwd.auto_GoogleMouseout, false);
        gwd.actions.events.removeHandler('facebook', 'click', gwd.faceclick, false);
        gwd.actions.events.removeHandler('twiter', 'click', gwd.twitclick, false);
        gwd.actions.events.removeHandler('googgle', 'click', gwd.googleclick, false);
        gwd.actions.events.removeHandler('viadeo', 'click', gwd.viadeoclick, false);
        gwd.actions.events.removeHandler('linkedin', 'click', gwd.linkclick, false);
        gwd.actions.events.removeHandler('viadeo', 'mouseover', gwd.auto_ViadeoMouseover, false);
        gwd.actions.events.removeHandler('viadeo', 'mouseout', gwd.auto_ViadeoMouseout, false);
        gwd.actions.events.removeHandler('linkedin', 'mouseover', gwd.auto_LinkedinMouseover, false);
        gwd.actions.events.removeHandler('linkedin', 'mouseout', gwd.auto_LinkedinMouseout, false);
      };
      document.addEventListener("DOMContentLoaded", gwd.actions.events.registerEventHandlers);
      document.addEventListener("unload", gwd.actions.events.deregisterEventHandlers);
      
  /**
   * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD 
   * * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD * ENCARD 
   */    
      
      gwd.actions.events.registerEventHandlers = function(event) {
          gwd.actions.events.addHandler('SiteWeb', 'mouseover', gwd.auto_SiteWebMouseover, false);
          gwd.actions.events.addHandler('SiteWeb', 'mouseout', gwd.auto_SiteWebMouseout, false);
          gwd.actions.events.addHandler('BoutiqueWeb', 'mouseover', gwd.auto_BoutiqueWebMouseover, false);
          gwd.actions.events.addHandler('BoutiqueWeb', 'mouseout', gwd.auto_BoutiqueWebMouseout, false);
          gwd.actions.events.addHandler('SiteWeb', 'click', gwd.SiteWeb, false);
          gwd.actions.events.addHandler('BoutiqueWeb', 'click', gwd.boutiqueweb, false);
          gwd.actions.events.addHandler('Adwords', 'mouseover', gwd.auto_AdwordsMouseover, false);
          gwd.actions.events.addHandler('Adwords', 'mouseout', gwd.auto_AdwordsMouseout, false);
          gwd.actions.events.addHandler('Adwords', 'click', gwd.adwords, false);
          gwd.actions.events.addHandler('plv', 'mouseover', gwd.auto_PlvMouseover, false);
          gwd.actions.events.addHandler('plv', 'mouseout', gwd.auto_PlvMouseout, false);
          gwd.actions.events.addHandler('plv', 'click', gwd.plv, false);
          gwd.actions.events.addHandler('LogoPrint', 'mouseover', gwd.auto_LogoPrintMouseover, false);
          gwd.actions.events.addHandler('LogoPrint', 'mouseout', gwd.auto_LogoPrintMouseout, false);
          gwd.actions.events.addHandler('LogoPrint', 'click', gwd.logo, false);
          gwd.actions.events.addHandler('Motion', 'mouseover', gwd.auto_MotionMouseover, false);
          gwd.actions.events.addHandler('Motion', 'mouseout', gwd.auto_MotionMouseout, false);
          gwd.actions.events.addHandler('Motion', 'click', gwd.motion, false);
          gwd.actions.events.addHandler('Assistance', 'mouseover', gwd.auto_AssistanceMouseover, false);
          gwd.actions.events.addHandler('Assistance', 'mouseout', gwd.auto_AssistanceMouseout, false);
          gwd.actions.events.addHandler('Assistance', 'click', gwd.assistance, false);
          gwd.actions.events.addHandler('Dolibarr', 'mouseover', gwd.auto_DolibarrMouseover, false);
          gwd.actions.events.addHandler('Dolibarr', 'mouseout', gwd.auto_DolibarrMouseout, false);
          gwd.actions.events.addHandler('Dolibarr', 'click', gwd.dolibarr, false);
          gwd.actions.events.addHandler('Formation', 'mouseover', gwd.auto_FormationMouseover, false);
          gwd.actions.events.addHandler('Formation', 'mouseout', gwd.auto_FormationMouseout, false);
          gwd.actions.events.addHandler('Formation', 'click', gwd.formation, false);
        };
        gwd.actions.events.deregisterEventHandlers = function(event) {
          gwd.actions.events.removeHandler('SiteWeb', 'mouseover', gwd.auto_SiteWebMouseover, false);
          gwd.actions.events.removeHandler('SiteWeb', 'mouseout', gwd.auto_SiteWebMouseout, false);
          gwd.actions.events.removeHandler('BoutiqueWeb', 'mouseover', gwd.auto_BoutiqueWebMouseover, false);
          gwd.actions.events.removeHandler('BoutiqueWeb', 'mouseout', gwd.auto_BoutiqueWebMouseout, false);
          gwd.actions.events.removeHandler('SiteWeb', 'click', gwd.SiteWeb, false);
          gwd.actions.events.removeHandler('BoutiqueWeb', 'click', gwd.boutiqueweb, false);
          gwd.actions.events.removeHandler('Adwords', 'mouseover', gwd.auto_AdwordsMouseover, false);
          gwd.actions.events.removeHandler('Adwords', 'mouseout', gwd.auto_AdwordsMouseout, false);
          gwd.actions.events.removeHandler('Adwords', 'click', gwd.adwords, false);
          gwd.actions.events.removeHandler('plv', 'mouseover', gwd.auto_PlvMouseover, false);
          gwd.actions.events.removeHandler('plv', 'mouseout', gwd.auto_PlvMouseout, false);
          gwd.actions.events.removeHandler('plv', 'click', gwd.plv, false);
          gwd.actions.events.removeHandler('LogoPrint', 'mouseover', gwd.auto_LogoPrintMouseover, false);
          gwd.actions.events.removeHandler('LogoPrint', 'mouseout', gwd.auto_LogoPrintMouseout, false);
          gwd.actions.events.removeHandler('LogoPrint', 'click', gwd.logo, false);
          gwd.actions.events.removeHandler('Motion', 'mouseover', gwd.auto_MotionMouseover, false);
          gwd.actions.events.removeHandler('Motion', 'mouseout', gwd.auto_MotionMouseout, false);
          gwd.actions.events.removeHandler('Motion', 'click', gwd.motion, false);
          gwd.actions.events.removeHandler('Assistance', 'mouseover', gwd.auto_AssistanceMouseover, false);
          gwd.actions.events.removeHandler('Assistance', 'mouseout', gwd.auto_AssistanceMouseout, false);
          gwd.actions.events.removeHandler('Assistance', 'click', gwd.assistance, false);
          gwd.actions.events.removeHandler('Dolibarr', 'mouseover', gwd.auto_DolibarrMouseover, false);
          gwd.actions.events.removeHandler('Dolibarr', 'mouseout', gwd.auto_DolibarrMouseout, false);
          gwd.actions.events.removeHandler('Dolibarr', 'click', gwd.dolibarr, false);
          gwd.actions.events.removeHandler('Formation', 'mouseover', gwd.auto_FormationMouseover, false);
          gwd.actions.events.removeHandler('Formation', 'mouseout', gwd.auto_FormationMouseout, false);
          gwd.actions.events.removeHandler('Formation', 'click', gwd.formation, false);
        };
        document.addEventListener("DOMContentLoaded", gwd.actions.events.registerEventHandlers);
        document.addEventListener("unload", gwd.actions.events.deregisterEventHandlers);
      