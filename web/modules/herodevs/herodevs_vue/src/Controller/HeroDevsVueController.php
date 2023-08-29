<?php
namespace Drupal\herodevs_vue\Controller;

use Drupal\Component\Utility\Html;

class HeroDevsVueController{

  public function home() {
    // Default settings.
    $config = \Drupal::config('herodevs_vue.settings');
    // Page title and source text.
    $page_title = $config->get('herodevs_vue.page_title');
    $vue_cdn = $config->get('herodevs_vue.vue_cdn');

    $element['#title'] = Html::escape($page_title);
    $element['#vue_cdn'] = $vue_cdn;
    $element['#theme'] = 'herodevs_vue';

    return $element;
  }
}
