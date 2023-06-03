/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, once) {
  'use strict';

  Drupal.AudiofieldMediaelement = {};

  Drupal.AudiofieldMediaelement.generate = function (context, file, settings) {
    var element = once('generate-mediaelement', file, context);
    $(element).mediaelementplayer({
      startVolume: settings.volume,
      loop: false,
      enableAutosize: true,
      isVideo: false
    });
  };

  Drupal.behaviors.audiofieldmediaelement = {
    attach: function attach(context, settings) {
      $.each(settings.audiofieldmediaelement, function (key, settingEntry) {
        $.each(settingEntry.elements, function (key2, fileEntry) {
          Drupal.AudiofieldMediaelement.generate(context, fileEntry, settingEntry);
        });
      });
    }
  };
})(jQuery, Drupal, once);