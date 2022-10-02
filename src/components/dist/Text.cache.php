<?php namespace App\View; use Saml; use Sami;use Sammy\Packs\Samils\Capsule\CapsuleScopeContext; use Sammy\Packs\CapsuleHelper; use Sammy\Packs\CapsuleHelper\ArrayHelper; use Sammy\Packs\CapsuleHelper\ObjectHelper;
# Capsule Body
?>
<?php Capsule::Def ('Text', function ($args, CapsuleScopeContext $scope) {
?>
<?php Capsule::PartialRender ('div', []); ?>
<?php }); ?>
<?php Capsule::Export ('Text'); ?><?php if (!(is_object ($module->exports) && $module->exports instanceof Capsule)) { $module->exports = Capsule::Create (function () {}); }?>