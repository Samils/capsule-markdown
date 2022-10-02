<?php
/**
 * [$module->exports description]
 * @var array
 * ---
 * Gogue Configuration
 */

$module->exports = array (
  /**
   * Target
   * The final php syntax to be generated
   * according to the transpiled codes.
   */
  'target' => 'capsule',

  'capsule.commandIdentifier' => true,
  'capsule.capsuleAutoExport' => true,
  'capsule.capsuleImportInterop' => false,
  'capsule.implicitCapsuleExport' => false,

  'capsule.gogueTranspilerOptions' => array (
    '@extends gogue.transpiler.options',

    'respawn' => true,
    'minify' => false,
    /**
     * A list of native supported filters
     * by the gogue capsule transpiler.
     * These should be ...
     */
    'filters' => array (
    ),
    /**
     * A list of paths to be parsed by the
     * capsule gogue transpiller when getting
     * a path source from imports
     */
    'paths' => array (
      '<\/.*>' => 'global/components/'
    )
  ),

  'baseDir' => join ('/', [__DIR__, 'src', 'components']),
  'outDir' => '/dist',

  'plugins' => [
    ['resolve' => 'gogue-plugin-capsule-xml-parser'],
    [
      'resolve' => 'gogue-plugin-capsule-css-parser',
      'options' => [
        'not-resolved-tag-name' => 'div',
        'allow-empty-parameter-value' => true,
        'default-styled-element-props' => [
          'data-el' => '1'
        ]
      ]
    ]
  ],

  'capsule-css-parser.outputCssFilePath' => '',

  'gogue.transpiler' => ['gogue/transpiler/base'],
  'gogue.transpiler.options' => array (
    'views.baseDir' => '/',
    'views.partialsBaseDir' => '/partails'
  )
);
