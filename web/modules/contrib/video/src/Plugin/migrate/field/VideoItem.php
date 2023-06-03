<?php

namespace Drupal\video\Plugin\migrate\field;

use Drupal\migrate\Plugin\MigrationInterface;
use Drupal\migrate_drupal\Plugin\migrate\field\FieldPluginBase;

/**
 * @MigrateField(
 *   id = "video",
 *   core = {7},
 *   source_module = "video",
 *   destination_module = "video",
 * )
 */
class VideoItem extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function getFieldWidgetMap() {
    return [
      'video_upload' => 'video_upload',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldFormatterMap() {
    return [
      'video_formatter_player' => 'video_player_list',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function defineValueProcessPipeline(MigrationInterface $migration, $field_name, $data) {
    $process = [
      'plugin' => 'iterator',
      'source' => $field_name,
      'process' => [
        'target_id' => 'fid',
      ],
    ];
    $migration->mergeProcessOfProperty($field_name, $process);
  }

}
