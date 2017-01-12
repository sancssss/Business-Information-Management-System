<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);
$this->registerJsFile('@web/js/signup.js');  
$this->registerJsFile("http://api.map.baidu.com/api?v=2.0&ak=iCq0b9iaCNHSYwmOCG8GPW90wlhyMrMc");


/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = '更新企业资料';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yii-company-create">

    <h3><?= Html::encode($this->title) ?>(需要重新审核)</h3>
    <div class="yii-company-form">
    <?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('error') ?>
    </div>
    <?php endif; ?>
    <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
            'template' => "{label}<div class=\"col-lg-4 col-md-5\">{input}</div>\n<div class=\"col-lg-7 col-md-6\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-md-1 control-label'],
            ],
    ]); ?>
    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_credit_code')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_charater')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_registered_capital')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_established_time')->textInput(['maxlength' => true]) ?>  
    <?=$this->registerJs("var signupCompany = Object.create(SignupRegion);
                        signupCompany.objectName = 'signupCompany';
                        signupCompany.finallyId = 'Company[company_region_id]';
                        signupCompany.rootNode = 'createcompanyform-div';
                        signupCompany.provinceNode = 'createcompanyform-province';
                        signupCompany.cityNode = 'createcompanyform-city';
                        signupCompany.regionNode = 'createcompanyform-region';",3)?>
    <div class="form-group field-company-company_region_id required form-inline">
    <label class="col-lg-1 col-md-1 control-label" for="createcompanyform-province">行政代码</label><div class="col-lg-3 col-md-4">
        <div id ="createcompanyform-div">
            <select id="createcompanyform-province" class="form-control" style="width: 100%;" onclick="signupCompany.selectProvince()" onchange="signupCompany.selectProvince()">
                <option value="<?=$model->company_region_id?>"><?=$model->companyRegion->region_name."($model->company_region_id)" ?></option>
                <option value="320000">江苏省</option>
            </select>
        </div>
    <div class="col-lg-8 col-md-7"><div class="help-block"></div></div>
    </div>
    </div>
    <div class="form-group">
    <?= $form->field($model, 'company_re_province', ['options' => ['class' => ''],'template' => "{label}<div class=\"col-lg-1 col-md-1\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])->label('省市县') ?>
    <?= $form->field($model, 'company_reg_city', ['options' => ['class' => ''], 'labelOptions' => ['class' => 'col-lg-1 col-md-1 row-no-padding'] ,'template' => "<div class=\"col-lg-1 col-md-1\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])?>
    <?= $form->field($model, 'company_reg_county', ['options' => ['class' => ''], 'template' => "<div class=\"col-lg-1 col-md-1\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])?>
    </div>
    <?= $form->field($model, 'company_reg_address')->textInput(['maxlength' => true])?>
    <div class="form-group">
    <?= $form->field($model, 'company_reg_longitude', ['options' => ['class' => ''],'template' => "{label}<div class=\"col-lg-1 col-md-1 row-no-padding\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])?>
    <?= $form->field($model, 'company_reg_latitude', ['options' => ['class' => ''],'template' => "{label}<div class=\"col-lg-1 col-md-1\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])?>
    </div>
    <div class="form-group">
    <?= $form->field($model, 'company_prod_province', ['options' => ['class' => ''],'template' => "{label}<div class=\"col-lg-1 col-md-1\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])?>
    <?= $form->field($model, 'company_prod_city', ['options' => ['class' => ''],'template' => "{label}<div class=\"col-lg-1 col-md-1\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])?>
    <?= $form->field($model, 'company_prod_county', ['options' => ['class' => ''],'template' => "{label}<div class=\"col-lg-1 col-md-1\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])?>
        <button onclick="openMap()" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">open map</button>
    </div>
    <?= $form->field($model, 'company_prod_address')->textInput(['maxlength' => true, 'readonly' => true])?>
    <div class="form-group">
    <?= $form->field($model, 'company_prod_longitude', ['options' => ['class' => ''],'template' => "{label}<div class=\"col-lg-2 col-md-2\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])?>
    <?= $form->field($model, 'company_prod_latitude', ['options' => ['class' => ''],'template' => "{label}<div class=\"col-lg-2 col-md-2\">{input}</div>"])->textInput(['maxlength' => true, 'readonly' => true])->label('纬度')?>
    </div>
    <?= $form->field($model, 'company_doctor_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_master_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_bachelor_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_juniorcollege_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_staff_num')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'company_comment')->textInput(['maxlength' => true])?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('更新',  ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div id="allmap">nisnxioasno</div>
	<p id="positionResult"></p>
     <script type="text/javascript">
	// 百度地图API功能
        function openMap(){
            alert("hi");
            var map = new BMap.Map("allmap");
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,11);
	map.enableScrollWheelZoom();
	map.enableInertialDragging();

	var size = new BMap.Size(10, 20);
	var geoc = new BMap.Geocoder(); 
	map.addControl(new BMap.CityListControl({
    anchor: BMAP_ANCHOR_TOP_LEFT,
    offset: size,
	}));
	function myFun(result){
		var cityName = result.name;
		map.setCenter(cityName);
	}
	var myCity = new BMap.LocalCity();
	myCity.get(myFun);

	function positionInfo(e){
		var result = document.getElementById('positionResult');
		result.innerText = e.point.lng + "," + e.point.lat;
		var pointMerge = new BMap.Point(e.point.lng, e.point.lat)
		geoc.getLocation(e.point, function(rs){
			var addComp = rs.addressComponents;
			alert(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
		});      
		alert(e.point.lng + "," + e.point.lat);
	}
	map.addEventListener("click", positionInfo);
        }
</script>
    </div>
  </div>
</div>
<div id="hidexml" style="display:none;">
<company><administrative_region_copy><row><region_id>320000</region_id><region_name>江苏省</region_name></row><row><region_id>320100</region_id><region_name>南京市</region_name></row><row><region_id>320101</region_id><region_name>市辖区</region_name></row><row><region_id>320102</region_id><region_name>玄武区</region_name></row><row><region_id>320103</region_id><region_name>白下区</region_name></row><row><region_id>320104</region_id><region_name>秦淮区</region_name></row><row><region_id>320105</region_id><region_name>建邺区</region_name></row><row><region_id>320106</region_id><region_name>鼓楼区</region_name></row><row><region_id>320107</region_id><region_name>下关区</region_name></row><row><region_id>320111</region_id><region_name>浦口区</region_name></row><row><region_id>320113</region_id><region_name>栖霞区</region_name></row><row><region_id>320114</region_id><region_name>雨花台区</region_name></row><row><region_id>320115</region_id><region_name>江宁区</region_name></row><row><region_id>320116</region_id><region_name>六合区</region_name></row><row><region_id>320124</region_id><region_name>溧水县</region_name></row><row><region_id>320125</region_id><region_name>高淳县</region_name></row><row><region_id>320200</region_id><region_name>无锡市</region_name></row><row><region_id>320201</region_id><region_name>市辖区</region_name></row><row><region_id>320202</region_id><region_name>崇安区</region_name></row><row><region_id>320203</region_id><region_name>南长区</region_name></row><row><region_id>320204</region_id><region_name>北塘区</region_name></row><row><region_id>320205</region_id><region_name>锡山区</region_name></row><row><region_id>320206</region_id><region_name>惠山区</region_name></row><row><region_id>320211</region_id><region_name>滨湖区</region_name></row><row><region_id>320281</region_id><region_name>江阴市</region_name></row><row><region_id>320282</region_id><region_name>宜兴市</region_name></row><row><region_id>320300</region_id><region_name>徐州市</region_name></row><row><region_id>320301</region_id><region_name>市辖区</region_name></row><row><region_id>320302</region_id><region_name>鼓楼区</region_name></row><row><region_id>320303</region_id><region_name>云龙区</region_name></row><row><region_id>320304</region_id><region_name>九里区</region_name></row><row><region_id>320305</region_id><region_name>贾汪区</region_name></row><row><region_id>320311</region_id><region_name>泉山区</region_name></row><row><region_id>320321</region_id><region_name>丰县</region_name></row><row><region_id>320322</region_id><region_name>沛县</region_name></row><row><region_id>320323</region_id><region_name>铜山县</region_name></row><row><region_id>320324</region_id><region_name>睢宁县</region_name></row><row><region_id>320381</region_id><region_name>新沂市</region_name></row><row><region_id>320382</region_id><region_name>邳州市</region_name></row><row><region_id>320400</region_id><region_name>常州市</region_name></row><row><region_id>320401</region_id><region_name>市辖区</region_name></row><row><region_id>320402</region_id><region_name>天宁区</region_name></row><row><region_id>320404</region_id><region_name>钟楼区</region_name></row><row><region_id>320405</region_id><region_name>戚墅堰区</region_name></row><row><region_id>320411</region_id><region_name>新北区</region_name></row><row><region_id>320412</region_id><region_name>武进区</region_name></row><row><region_id>320481</region_id><region_name>溧阳市</region_name></row><row><region_id>320482</region_id><region_name>金坛市</region_name></row><row><region_id>320500</region_id><region_name>苏州市</region_name></row><row><region_id>320501</region_id><region_name>市辖区</region_name></row><row><region_id>320502</region_id><region_name>沧浪区</region_name></row><row><region_id>320503</region_id><region_name>平江区</region_name></row><row><region_id>320504</region_id><region_name>金阊区</region_name></row><row><region_id>320505</region_id><region_name>虎丘区</region_name></row><row><region_id>320506</region_id><region_name>吴中区</region_name></row><row><region_id>320507</region_id><region_name>相城区</region_name></row><row><region_id>320581</region_id><region_name>常熟市</region_name></row><row><region_id>320582</region_id><region_name>张家港市</region_name></row><row><region_id>320583</region_id><region_name>昆山市</region_name></row><row><region_id>320584</region_id><region_name>吴江市</region_name></row><row><region_id>320585</region_id><region_name>太仓市</region_name></row><row><region_id>320600</region_id><region_name>南通市</region_name></row><row><region_id>320601</region_id><region_name>市辖区</region_name></row><row><region_id>320602</region_id><region_name>崇川区</region_name></row><row><region_id>320611</region_id><region_name>港闸区</region_name></row><row><region_id>320621</region_id><region_name>海安县</region_name></row><row><region_id>320623</region_id><region_name>如东县</region_name></row><row><region_id>320681</region_id><region_name>启东市</region_name></row><row><region_id>320682</region_id><region_name>如皋市</region_name></row><row><region_id>320683</region_id><region_name>通州市</region_name></row><row><region_id>320684</region_id><region_name>海门市</region_name></row><row><region_id>320700</region_id><region_name>连云港市</region_name></row><row><region_id>320701</region_id><region_name>市辖区</region_name></row><row><region_id>320703</region_id><region_name>连云区</region_name></row><row><region_id>320705</region_id><region_name>新浦区</region_name></row><row><region_id>320706</region_id><region_name>海州区</region_name></row><row><region_id>320721</region_id><region_name>赣榆县</region_name></row><row><region_id>320722</region_id><region_name>东海县</region_name></row><row><region_id>320723</region_id><region_name>灌云县</region_name></row><row><region_id>320724</region_id><region_name>灌南县</region_name></row><row><region_id>320800</region_id><region_name>淮安市</region_name></row><row><region_id>320801</region_id><region_name>市辖区</region_name></row><row><region_id>320802</region_id><region_name>清河区</region_name></row><row><region_id>320803</region_id><region_name>楚州区</region_name></row><row><region_id>320804</region_id><region_name>淮阴区</region_name></row><row><region_id>320811</region_id><region_name>清浦区</region_name></row><row><region_id>320826</region_id><region_name>涟水县</region_name></row><row><region_id>320829</region_id><region_name>洪泽县</region_name></row><row><region_id>320830</region_id><region_name>盱眙县</region_name></row><row><region_id>320831</region_id><region_name>金湖县</region_name></row><row><region_id>320900</region_id><region_name>盐城市</region_name></row><row><region_id>320901</region_id><region_name>市辖区</region_name></row><row><region_id>320902</region_id><region_name>亭湖区</region_name></row><row><region_id>320903</region_id><region_name>盐都区</region_name></row><row><region_id>320921</region_id><region_name>响水县</region_name></row><row><region_id>320922</region_id><region_name>滨海县</region_name></row><row><region_id>320923</region_id><region_name>阜宁县</region_name></row><row><region_id>320924</region_id><region_name>射阳县</region_name></row><row><region_id>320925</region_id><region_name>建湖县</region_name></row><row><region_id>320981</region_id><region_name>东台市</region_name></row><row><region_id>320982</region_id><region_name>大丰市</region_name></row><row><region_id>321000</region_id><region_name>扬州市</region_name></row><row><region_id>321001</region_id><region_name>市辖区</region_name></row><row><region_id>321002</region_id><region_name>广陵区</region_name></row><row><region_id>321003</region_id><region_name>邗江区</region_name></row><row><region_id>321011</region_id><region_name>维扬区</region_name></row><row><region_id>321023</region_id><region_name>宝应县</region_name></row><row><region_id>321081</region_id><region_name>仪征市</region_name></row><row><region_id>321084</region_id><region_name>高邮市</region_name></row><row><region_id>321088</region_id><region_name>江都市</region_name></row><row><region_id>321100</region_id><region_name>镇江市</region_name></row><row><region_id>321101</region_id><region_name>市辖区</region_name></row><row><region_id>321102</region_id><region_name>京口区</region_name></row><row><region_id>321111</region_id><region_name>润州区</region_name></row><row><region_id>321112</region_id><region_name>丹徒区</region_name></row><row><region_id>321181</region_id><region_name>丹阳市</region_name></row><row><region_id>321182</region_id><region_name>扬中市</region_name></row><row><region_id>321183</region_id><region_name>句容市</region_name></row><row><region_id>321200</region_id><region_name>泰州市</region_name></row><row><region_id>321201</region_id><region_name>市辖区</region_name></row><row><region_id>321202</region_id><region_name>海陵区</region_name></row><row><region_id>321203</region_id><region_name>高港区</region_name></row><row><region_id>321281</region_id><region_name>兴化市</region_name></row><row><region_id>321282</region_id><region_name>靖江市</region_name></row><row><region_id>321283</region_id><region_name>泰兴市</region_name></row><row><region_id>321284</region_id><region_name>姜堰市</region_name></row><row><region_id>321300</region_id><region_name>宿迁市</region_name></row><row><region_id>321301</region_id><region_name>市辖区</region_name></row><row><region_id>321302</region_id><region_name>宿城区</region_name></row><row><region_id>321311</region_id><region_name>宿豫区</region_name></row><row><region_id>321322</region_id><region_name>沭阳县</region_name></row><row><region_id>321323</region_id><region_name>泗阳县</region_name></row><row><region_id>321324</region_id><region_name>泗洪县</region_name></row><row><region_id>321400</region_id><region_name>农场</region_name></row><row><region_id>321401</region_id><region_name>黄海与新洋农场</region_name></row><row><region_id>321402</region_id><region_name>东辛中心农场</region_name></row><row><region_id>321403</region_id><region_name>淮海中心农场</region_name></row><row><region_id>321004</region_id><region_name>开发区</region_name></row><row><region_id>321113</region_id><region_name>新区</region_name></row></administrative_region_copy></company>
</div>
</div>
