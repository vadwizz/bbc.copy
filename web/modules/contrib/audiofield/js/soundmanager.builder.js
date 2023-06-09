/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, once) {
  'use strict';

  Drupal.behaviors.audiofieldsoundmanager = {
    attach: function attach(context, settings) {
      soundManager.setup({
        url: settings.audiofieldsoundmanager.swfpath,
        preferFlash: false,
        defaultOptions: {
          volume: settings.audiofieldsoundmanager.volume
        }
      });
    }
  };
})(jQuery, Drupal, once);