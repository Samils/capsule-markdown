<?php
/**
 * @version 2.0
 * @author Sammy
 *
 * @keywords Samils, ils, php framework
 * -----------------
 * @package Sammy\Packs\CapsuleMarkDown
 * - Autoload, application dependencies
 *
 * MIT License
 *
 * Copyright (c) 2020 Ysare
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
namespace Sammy\Packs\CapsuleMarkDown {
  use Sammy\Packs\Samils\Capsule\MarkDown;
  /**
   * Make sure the module base internal class is not
   * declared in the php global scope before creating
   * it.
   * It ensures that the script flux is not interrupted
   * when trying to run the current command by the cli
   * API.
   */
  if (!class_exists ('Sammy\Packs\CapsuleMarkDown\Commands')) {
  /**
   * @class Commands
   * Base internal class for the
   * CapsuleMarkDown module.
   * -
   * This is (in the ils environment)
   * an instance of the php module,
   * which should contain the module
   * core functionalities that should
   * be extended.
   * -
   * For extending the module, just create
   * an 'exts' directory in the module directory
   * and boot it by using the ils directory boot.
   * -
   */
  class Commands {
    /**
     * @method void setup
     */
    public static function setup () {
      $autoloadFile = dirname (dirname (dirname (__DIR__))) . '/vendor/autoload.php';

      if (is_file ($autoloadFile)) {
        require ($autoloadFile);
      }
    }

    /**
     * @method void dev
     */
    public static function dev () {
      self::setup ();

      $xsami = requires ('xsami');
      # XSAMI
      # Run the XSami lib

      $app = $xsami();

      $app->handler = function () {
        list ($args) = func_get_args ();

        $cli = requires ('~/src/cli');

        $cli->runRaw ($args);
      };

      $xsami->runApp ($app);
    }
  }}
}
