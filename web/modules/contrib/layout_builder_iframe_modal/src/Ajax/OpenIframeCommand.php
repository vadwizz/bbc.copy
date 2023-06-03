<?php

declare(strict_types=1);

namespace Drupal\layout_builder_iframe_modal\Ajax;

use Drupal\Core\Ajax\OpenDialogCommand;

/**
 * An AJAX command to open a link in a modal iframe.
 *
 * @ingroup ajax
 */
class OpenIframeCommand extends OpenDialogCommand {

  /**
   * {@inheritdoc}
   */
  public function __construct($title, $content, array $dialog_options = [], $settings = NULL) {
    $dialog_options['modal'] = TRUE;
    parent::__construct('#drupal-lbim-modal', $title, $content, $dialog_options, $settings);
  }

  /**
   * {@inheritdoc}
   */
  public function render(): array {
    $this->dialogOptions['modal'] = isset($this->dialogOptions['modal']) && $this->dialogOptions['modal'];
    $this->setDialogOption('autoResize', FALSE);
    $this->setDialogOption('resizable', TRUE);
    $this->setDialogOption('draggable', TRUE);
    $this->setDialogOption('width', 1000);
    $this->setDialogOption('height', 900);

    return [
      'command' => 'openIframe',
      'selector' => $this->selector,
      'settings' => $this->settings,
      'data' => $this->getRenderedContent(),
      'dialogOptions' => $this->dialogOptions,
    ];
  }

}
