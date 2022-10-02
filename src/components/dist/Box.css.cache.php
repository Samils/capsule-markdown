<?php 
namespace App\View; 
use Saml; 
use Sami;
use Sammy\Packs\Samils\Capsule\CapsuleScopeContext; 
use Sammy\Packs\CapsuleHelper; 
use Sammy\Packs\CapsuleHelper\ArrayHelper; 
use Sammy\Packs\CapsuleHelper\ObjectHelper;
# Capsule Body


if (!function_exists ('App\View\generateComponentSelectorRef')) {
function generateComponentSelectorRef ($componentName) {
	return join ('', [
		$componentName,
		rand (0, 99999),
		rand (111, 9999) * rand (222, 99999),
		(int)time () * rand (111, 99999),
		time (),
		'r'
	]);
}}

Capsule::Def ('Box', function ($args, CapsuleScopeContext $scope) {
	$scope->color = !(isset ($args ['color'])) ? "red" : $args ['color'];

	$scope->componentSelectorReference = call_user_func ('App\View\generateComponentSelectorRef', 'Box');
	return Capsule::PartialRender ('Fragment', [], Capsule::CreateElement ('head', [], Capsule::CreateElement ('style', ['data-styled-component' => 'Box', 'data-styled-component-id' => $scope->componentSelectorReference, 'type' => 'text/css'], function ($args, CapsuleScopeContext $scope) {return 'div.'.$scope->componentSelectorReference.'{width:200px;height:200px;background-color:'.(!is_null ($scope->color) ? $scope->color : 'inherit').';border:1px solid black;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;-ms-border-radius:4px;}';})), Capsule::CreateElement ('div', array_merge (ArrayHelper::PropsBeyond (['color','children'], $args), ['class' => join (' ', [$scope->componentSelectorReference, ((isset ($args ['class']) && is_string ($args ['class'])) ? $args ['class'] : '')])]), Capsule::Yield (null, [])));
});

Capsule::Export ('Box');



if (!(is_object ($module->exports) && $module->exports instanceof Capsule)) {
	$module->exports = Capsule::Create (function () {
		return Capsule::PartialRender ('Fragment', []);
	});
}