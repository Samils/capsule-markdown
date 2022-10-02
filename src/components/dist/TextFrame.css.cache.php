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

Capsule::Def ('TextFrame', function ($args, CapsuleScopeContext $scope) {


	$scope->componentSelectorReference = call_user_func ('App\View\generateComponentSelectorRef', 'TextFrame');
	return Capsule::PartialRender ('Fragment', [], Capsule::CreateElement ('head', [], Capsule::CreateElement ('style', ['data-styled-component' => 'TextFrame', 'data-styled-component-id' => $scope->componentSelectorReference, 'type' => 'text/css'], function ($args, CapsuleScopeContext $scope) {return 'div.'.$scope->componentSelectorReference.'{border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;-o-border-radius:5px;-ms-border-radius:5px;width:10px;height:10px;background-size:'.call_user_func(function($str){return $str;},'100% 100%').';-webkit-background-size:'.call_user_func(function($str){return $str;},'100% 100%').';-moz-background-size:'.call_user_func(function($str){return $str;},'100% 100%').';-o-background-size:'.call_user_func(function($str){return $str;},'100% 100%').';-ms-background-size:'.call_user_func(function($str){return $str;},'100% 100%').';}';})), Capsule::CreateElement ('div', array_merge (ArrayHelper::PropsBeyond (['children'], $args), ['class' => join (' ', [$scope->componentSelectorReference, ((isset ($args ['class']) && is_string ($args ['class'])) ? $args ['class'] : '')])]), Capsule::Yield (null, [])));
});

Capsule::Export ('TextFrame');



if (!(is_object ($module->exports) && $module->exports instanceof Capsule)) {
	$module->exports = Capsule::Create (function () {
		return Capsule::PartialRender ('Fragment', []);
	});
}