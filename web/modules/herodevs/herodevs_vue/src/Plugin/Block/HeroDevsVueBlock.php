<?php

namespace Drupal\herodevs_vue\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a HeroDevs Vue block.
 *
 * @Block(
 *   id = "herodevs_vue_block",
 *   admin_label = @Translation("HeroDevs Vue block"),
 * )
 */
class HeroDevsVueBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return \Drupal::formBuilder()->getForm('Drupal\herodevs_vue\Form\HeroDevsVueBlockForm');
  }
  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'HeroDevs Vue');
  }
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('herodevs_vue_block_settings', $form_state
    ->getValue('herodevs_vue_block_settings'));
  }

}
