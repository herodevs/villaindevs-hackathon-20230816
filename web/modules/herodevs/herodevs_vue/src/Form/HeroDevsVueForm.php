<?php

namespace Drupal\herodevs_vue\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class HeroDevsVueForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'herodevs_vue_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Form constructor.
    $form = parent::buildForm($form, $form_state);
    // Default settings.
    $config = $this->config('herodevs_vue.settings');

    // Page title field.
    $form['page_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('HeroDevs Vue Page Title:'),
      '#default_value' => $config->get('herodevs_vue.page_title'),
      '#description' => $this->t('Give your HeroDevs Vue page a title.'),
    ];
    // Source text field.
    $form['vue_cdn'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Vue CDN URL'),
      '#default_value' => $config->get('herodevs_vue.vue_cdn'),
      '#description' => $this->t('URL for Vue CDN used in the HeroDevs page'),
    ];

    return $form;
  }

  /**
    * {@inheritdoc}
    */
   public function validateForm(array &$form, FormStateInterface $form_state) {

   }

     /**
      * {@inheritdoc}
      */
     public function submitForm(array &$form, FormStateInterface $form_state) {
       $config = $this->config('herodevs_vue.settings');
       $config->set('herodevs_vue.vue_cdn', $form_state->getValue('vue_cdn'));
       $config->set('herodevs_vue.page_title', $form_state->getValue('page_title'));
       $config->save();
       return parent::submitForm($form, $form_state);
     }
/**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'herodevs_vue.settings',
    ];
  }
}
