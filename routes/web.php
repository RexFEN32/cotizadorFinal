<?php

use App\Http\Controllers\CrossbarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoubleDeepController;
use App\Http\Controllers\DoubleDeepCrossbarController;
use App\Http\Controllers\DoubleDeepFloorController;
use App\Http\Controllers\DoubleDeepFloorReinforcementController;
use App\Http\Controllers\DoubleDeepFramesController;
use App\Http\Controllers\DoubleDeepMenuFrameController;
use App\Http\Controllers\DoubleDeepMenuJoistController;
use App\Http\Controllers\DoubleDeepMiniatureFrameController;
use App\Http\Controllers\DoubleDeepSpacerController;
use App\Http\Controllers\DoubleDeepStructuralFrameworksController;
use App\Http\Controllers\DoubleDeepTypeBox25JoistController;
use App\Http\Controllers\DoubleDeepTypeBox2JoistController;
use App\Http\Controllers\DoubleDeepTypeC2JoistController;
use App\Http\Controllers\DoubleDeepTypeChairJoistController;
use App\Http\Controllers\DoubleDeepTypeL25JoistController;
use App\Http\Controllers\DoubleDeepTypeL2JoistController;
use App\Http\Controllers\DoubleDeepTypeLRJoistController;
use App\Http\Controllers\DoubleDeepTypeStructuralJoistController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\FloorReinforcementController;
use App\Http\Controllers\FramesController;
use App\Http\Controllers\FreightController;
use App\Http\Controllers\GrillController;
use App\Http\Controllers\MenuFrameController;
use App\Http\Controllers\MenuJoistController;
use App\Http\Controllers\MiniatureFrameController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\QuestionaryChartController;
use App\Http\Controllers\QuotationAdministrativeController;
use App\Http\Controllers\QuotationChairJoistGalvanizedPanelController;
use App\Http\Controllers\QuotationChairJoistLPaintedPanelController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuotationInstallController;
use App\Http\Controllers\QuotationPairBarsProtectorController;
use App\Http\Controllers\QuotationProtectorController;
use App\Http\Controllers\QuotationSpecialController;
use App\Http\Controllers\QuotationTwoInJoistLGalvanizedPanelController;
use App\Http\Controllers\QuotationTwoInJoistLPaintedPanelController;
use App\Http\Controllers\QuotationTwoPointFiveInJoistLGalvanizedPanelController;
use App\Http\Controllers\QuotationTwoPointFiveInJoistLPaintedPanelController;
use App\Http\Controllers\QuotationUninstallController;
use App\Http\Controllers\SelectivoController;
use App\Http\Controllers\SinglePieceController;
use App\Http\Controllers\SpacerController;
use App\Http\Controllers\StructuralFrameworksController;
use App\Http\Controllers\TypeBox25JoistController;
use App\Http\Controllers\TypeBox2JoistController;
use App\Http\Controllers\TypeC2JoistController;
use App\Http\Controllers\TypeChairJoistController;
use App\Http\Controllers\TypeL25JoistController;
use App\Http\Controllers\TypeL2JoistController;
use App\Http\Controllers\TypeLJoistController;
use App\Http\Controllers\TypeLRJoistController;
use App\Http\Controllers\TypeStructuralJoistController;
use App\Http\Controllers\WoodController;
use App\Http\Controllers\CartController;
use App\Models\QuestionaryChart;
use App\Models\Quotation;
use App\Models\QuotationInstall;
use App\Models\QuotationProtector;
use App\Models\SinglePiece;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('login'));
});

Route::group(['middleware' => ['auth:sanctum'], 'verified'], function()
{
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('open_request', [DashboardController::class, 'open_request'])->name('open_request');
    Route::get('quoter/{id}', [DashboardController::class, 'quoter'])->name('quoter');
    Route::post('rack_engineering', [DashboardController::class, 'rack_engineering'])->name('rack_engineering');
    Route::get('rack_engineering_form/{id}', [DashboardController::class, 'rack_engineering_form'])->name('rack_engineering_form');
    Route::post('cuestionario_inicial', [DashboardController::class, 'cuestionario_inicial'])->name('cuestionario_inicial');
    Route::post('material_list_engineering_form', [DashboardController::class, 'material_list_engineering_form'])->name('material_list_engineering_form');
    Route::post('layout_quoter', [DashboardController::class, 'layout_quoter'])->name('layout_quoter');
    Route::post('photos_quoter', [DashboardController::class, 'photos_quoter'])->name('photos_quoter');
    Route::get('addphotos/{id}', [DashboardController::class, 'addphotos'])->name('addphotos');
    Route::resource('questionary_charts', QuestionaryChartController::class);
    Route::get('return_material_list/{id}', [DashboardController::class, 'return_material_list'])->name('return_material_list');
    Route::post('product_menu', [DashboardController::class, 'product_menu'])->name('product_menu');

    Route::get('/selectivo', [SelectivoController::class, 'index'])->name('selectivo.index');
    Route::get('/selectivo/{id}', [SelectivoController::class, 'show'])->name('selectivo.show');

    Route::get('/selectivo_marcos/{id}', [MenuFrameController::class, 'show'])->name('menuframes.show');
    Route::get('/selectivo_vigas/{id}', [MenuJoistController::class, 'show'])->name('menujoists.show');

    Route::get('/selectivo_crossbars/{id}', [CrossbarController::class, 'show'])->name('crossbars.show');
    Route::post('/selectivo_crossbars/calc', [CrossbarController::class, 'calc'])->name('crossbars.calc');
    
    Route::post('/selectivo_floors/calc', [FloorController::class, 'calc'])->name('floors.calc');
    Route::get('/selectivo_floors/{id}', [FloorController::class, 'show'])->name('floors.show');

    Route::post('/selectivo_floor_reinforcements/calc', [FloorReinforcementController::class, 'calc'])->name('floor_reinforcements.calc');
    Route::get('/selectivo_floor_reinforcements/{id}', [FloorReinforcementController::class, 'show'])->name('floor_reinforcements.show');
    
    Route::get('/selectivo_spacers/{id}', [SpacerController::class, 'show'])->name('spacers.show');
    Route::post('/selectivo_spacers/calc', [SpacerController::class, 'calc'])->name('spacers.calc');

    Route::get('/selectivo_carga_pesada/{id}', [FramesController::class, 'show'])->name('frames.show');
    Route::post('/selectivo_carga_pesada', [FramesController::class, 'store'])->name('frames.store');

    Route::get('/selectivo_minimarcos/{id}', [MiniatureFrameController::class, 'show'])->name('miniatureframe.show');
    Route::post('/selectivo_minimarcos', [MiniatureFrameController::class, 'store'])->name('miniatureframe.store');
    
    Route::get('/selectivo_marcos_estructurales/{id}', [StructuralFrameworksController::class, 'show'])->name('structuralframeworks.show');
    Route::post('/selectivo_marcos_estructurales', [StructuralFrameworksController::class, 'store'])->name('structuralframeworks.store');

    Route::get('/selectivo_vigas_tipo_L_2/{id}', [TypeL2JoistController::class, 'show'])->name('typel2joists.show');
    Route::post('/selectivo_vigas_tipo_L_2/', [TypeL2JoistController::class, 'store'])->name('typel2joists.store');
    
    Route::get('/selectivo_vigas_tipo_L_2/calibre14/{id}', [TypeL2JoistController::class, 'caliber14_show'])->name('typel2joists_caliber14.show');
    Route::post('/selectivo_vigas_tipo_L_2/calibre14', [TypeL2JoistController::class, 'caliber14_calc'])->name('typel2joists_caliber14.calc');

    Route::get('/selectivo_vigas_tipo_L_2_5/{id}', [TypeL25JoistController::class, 'show'])->name('typel25joists.show');
    Route::post('/selectivo_vigas_tipo_L_2_5/', [TypeL25JoistController::class, 'store'])->name('typel25joists.store');
    
    Route::get('/selectivo_vigas_tipo_L_2_5/calibre14/{id}', [TypeL25JoistController::class, 'caliber14_show'])->name('typel25joists_caliber14.show');
    Route::post('/selectivo_vigas_tipo_L_2_5/calibre14', [TypeL25JoistController::class, 'caliber14_calc'])->name('typel25joists_caliber14.calc');

    Route::get('/selectivo_vigas_tipo_Box_2/{id}', [TypeBox2JoistController::class, 'show'])->name('typebox2joists.show');
    Route::post('/selectivo_vigas_tipo_Box_2/', [TypeBox2JoistController::class, 'store'])->name('typebox2joists.store');
    
    Route::get('/selectivo_vigas_tipo_Box_2/calibre14/{id}', [TypeBox2JoistController::class, 'caliber14_show'])->name('typebox2joists_caliber14.show');
    Route::post('/selectivo_vigas_tipo_Box_2/calibre14', [TypeBox2JoistController::class, 'caliber14_calc'])->name('typebox2joists_caliber14.calc');

    Route::get('/selectivo_vigas_tipo_Box_25/{id}', [TypeBox25JoistController::class, 'show'])->name('typebox25joists.show');
    Route::post('/selectivo_vigas_tipo_Box_25/', [TypeBox25JoistController::class, 'store'])->name('typebox25joists.store');
    
    Route::get('/selectivo_vigas_tipo_Box_25/calibre14/{id}', [TypeBox25JoistController::class, 'caliber14_show'])->name('typebox25joists_caliber14.show');
    Route::post('/selectivo_vigas_tipo_Box_25/calibre14', [TypeBox25JoistController::class, 'caliber14_calc'])->name('typebox25joists_caliber14.calc');

    Route::get('/selectivo_vigas_tipo_Structural/{id}', [TypeStructuralJoistController::class, 'show'])->name('typestructuraljoists.show');
    Route::post('/selectivo_vigas_tipo_Structural/', [TypeStructuralJoistController::class, 'store'])->name('typestructuraljoists.store');
    
    Route::get('/selectivo_vigas_tipo_Structural/calibre14/{id}', [TypeStructuralJoistController::class, 'caliber14_show'])->name('typestructuraljoists_caliber14.show');
    Route::post('/selectivo_vigas_tipo_Structural/calibre14', [TypeStructuralJoistController::class, 'caliber14_calc'])->name('typestructuraljoists_caliber14.calc');

    Route::get('/selectivo_vigas_tipo_C2/{id}', [TypeC2JoistController::class, 'show'])->name('typec2joists.show');
    Route::post('/selectivo_vigas_tipo_C2/', [TypeC2JoistController::class, 'store'])->name('typec2joists.store');
    
    Route::get('/selectivo_vigas_tipo_C2/calibre14/{id}', [TypeC2JoistController::class, 'caliber14_show'])->name('typec2joists_caliber14.show');
    Route::post('/selectivo_vigas_tipo_C2/calibre14', [TypeC2JoistController::class, 'caliber14_calc'])->name('typec2joists_caliber14.calc');

    Route::get('/selectivo_vigas_tipo_LR/{id}', [TypeLRJoistController::class, 'show'])->name('typelrjoists.show');
    Route::post('/selectivo_vigas_tipo_LR/', [TypeLRJoistController::class, 'store'])->name('typelrjoists.store');
    
    Route::get('/selectivo_vigas_tipo_LR/calibre14/{id}', [TypeLRJoistController::class, 'caliber14_show'])->name('typelrjoists_caliber14.show');
    Route::post('/selectivo_vigas_tipo_LR/calibre14', [TypeLRJoistController::class, 'caliber14_calc'])->name('typelrjoists_caliber14.calc');

    Route::get('/selectivo_vigas_tipo_Chair/{id}', [TypeChairJoistController::class, 'show'])->name('typechairjoists.show');
    Route::post('/selectivo_vigas_tipo_Chair/', [TypeChairJoistController::class, 'store'])->name('typechairjoists.store');
    
    Route::get('/selectivo_vigas_tipo_Chair/calibre14/{id}', [TypeChairJoistController::class, 'caliber14_show'])->name('typechairjoists_caliber14.show');
    Route::post('/selectivo_vigas_tipo_Chair/calibre14', [TypeChairJoistController::class, 'caliber14_calc'])->name('typechairjoists_caliber14.calc');


    Route::get('/double_deep', [DoubleDeepController::class, 'index'])->name('double_deep.index');
    Route::get('/double_deep/{id}', [DoubleDeepController::class, 'show'])->name('double_deep.show');

    Route::get('/double_deep_marcos/{id}', [DoubleDeepMenuFrameController::class, 'show'])->name('double_deep_menuframes.show');
    Route::get('/double_deep_vigas/{id}', [DoubleDeepMenuJoistController::class, 'show'])->name('double_deep_menujoists.show');

    Route::get('/double_deep_crossbars/{id}', [DoubleDeepCrossbarController::class, 'show'])->name('double_deep_crossbars.show');
    Route::post('/double_deep_crossbars/calc', [DoubleDeepCrossbarController::class, 'calc'])->name('double_deep_crossbars.calc');
    
    Route::post('/double_deep_floors/calc', [DoubleDeepFloorController::class, 'calc'])->name('double_deep_floors.calc');
    Route::get('/double_deep_floors/{id}', [DoubleDeepFloorController::class, 'show'])->name('double_deep_floors.show');

    Route::post('/double_deep_floor_reinforcements/calc', [DoubleDeepFloorReinforcementController::class, 'calc'])->name('double_deep_floor_reinforcements.calc');
    Route::get('/double_deep_floor_reinforcements/{id}', [DoubleDeepFloorReinforcementController::class, 'show'])->name('double_deep_floor_reinforcements.show');
    
    Route::get('/double_deep_spacers/{id}', [DoubleDeepSpacerController::class, 'show'])->name('double_deep_spacers.show');
    Route::post('/double_deep_spacers/calc', [DoubleDeepSpacerController::class, 'calc'])->name('double_deep_spacers.calc');

    Route::get('/double_deep_carga_pesada/{id}', [DoubleDeepFramesController::class, 'show'])->name('double_deep_frames.show');
    Route::post('/double_deep_carga_pesada', [DoubleDeepFramesController::class, 'store'])->name('double_deep_frames.store');

    Route::get('/double_deep_minimarcos/{id}', [DoubleDeepMiniatureFrameController::class, 'show'])->name('double_deep_miniatureframe.show');
    Route::post('/double_deep_minimarcos', [DoubleDeepMiniatureFrameController::class, 'store'])->name('double_deep_miniatureframe.store');
    
    Route::get('/double_deep_marcos_estructurales/{id}', [DoubleDeepStructuralFrameworksController::class, 'show'])->name('double_deep_structuralframeworks.show');
    Route::post('/double_deep_marcos_estructurales', [DoubleDeepStructuralFrameworksController::class, 'store'])->name('double_deep_structuralframeworks.store');

    Route::get('/double_deep_vigas_tipo_L_2/{id}', [DoubleDeepTypeL2JoistController::class, 'show'])->name('double_deep_typel2joists.show');
    Route::post('/double_deep_vigas_tipo_L_2/', [DoubleDeepTypeL2JoistController::class, 'store'])->name('double_deep_typel2joists.store');
    
    Route::get('/double_deep_vigas_tipo_L_2/calibre14/{id}', [DoubleDeepTypeL2JoistController::class, 'caliber14_show'])->name('double_deep_typel2joists_caliber14.show');
    Route::post('/double_deep_vigas_tipo_L_2/calibre14', [DoubleDeepTypeL2JoistController::class, 'caliber14_calc'])->name('double_deep_typel2joists_caliber14.calc');

    Route::get('/double_deep_vigas_tipo_L_2_5/{id}', [DoubleDeepTypeL25JoistController::class, 'show'])->name('double_deep_typel25joists.show');
    Route::post('/double_deep_vigas_tipo_L_2_5/', [DoubleDeepTypeL25JoistController::class, 'store'])->name('double_deep_typel25joists.store');
    
    Route::get('/double_deep_vigas_tipo_L_2_5/calibre14/{id}', [DoubleDeepTypeL25JoistController::class, 'caliber14_show'])->name('double_deep_typel25joists_caliber14.show');
    Route::post('/double_deep_vigas_tipo_L_2_5/calibre14', [DoubleDeepTypeL25JoistController::class, 'caliber14_calc'])->name('double_deep_typel25joists_caliber14.calc');

    Route::get('/double_deep_vigas_tipo_Box_2/{id}', [DoubleDeepTypeBox2JoistController::class, 'show'])->name('double_deep_typebox2joists.show');
    Route::post('/double_deep_vigas_tipo_Box_2/', [DoubleDeepTypeBox2JoistController::class, 'store'])->name('double_deep_typebox2joists.store');
    
    Route::get('/double_deep_vigas_tipo_Box_2/calibre14/{id}', [DoubleDeepTypeBox2JoistController::class, 'caliber14_show'])->name('double_deep_typebox2joists_caliber14.show');
    Route::post('/double_deep_vigas_tipo_Box_2/calibre14', [DoubleDeepTypeBox2JoistController::class, 'caliber14_calc'])->name('double_deep_typebox2joists_caliber14.calc');

    Route::get('/double_deep_vigas_tipo_Box_25/{id}', [DoubleDeepTypeBox25JoistController::class, 'show'])->name('double_deep_typebox25joists.show');
    Route::post('/double_deep_vigas_tipo_Box_25/', [DoubleDeepTypeBox25JoistController::class, 'store'])->name('double_deep_typebox25joists.store');
    
    Route::get('/double_deep_vigas_tipo_Box_25/calibre14/{id}', [DoubleDeepTypeBox25JoistController::class, 'caliber14_show'])->name('double_deep_typebox25joists_caliber14.show');
    Route::post('/double_deep_vigas_tipo_Box_25/calibre14', [DoubleDeepTypeBox25JoistController::class, 'caliber14_calc'])->name('double_deep_typebox25joists_caliber14.calc');

    Route::get('/double_deep_vigas_tipo_Structural/{id}', [DoubleDeepTypeStructuralJoistController::class, 'show'])->name('double_deep_typestructuraljoists.show');
    Route::post('/double_deep_vigas_tipo_Structural/', [DoubleDeepTypeStructuralJoistController::class, 'store'])->name('double_deep_typestructuraljoists.store');
    
    Route::get('/double_deep_vigas_tipo_Structural/calibre14/{id}', [DoubleDeepTypeStructuralJoistController::class, 'caliber14_show'])->name('double_deep_typestructuraljoists_caliber14.show');
    Route::post('/double_deep_vigas_tipo_Structural/calibre14', [DoubleDeepTypeStructuralJoistController::class, 'caliber14_calc'])->name('double_deep_typestructuraljoists_caliber14.calc');

    Route::get('/double_deep_vigas_tipo_C2/{id}', [DoubleDeepTypeC2JoistController::class, 'show'])->name('double_deep_typec2joists.show');
    Route::post('/double_deep_vigas_tipo_C2/', [DoubleDeepTypeC2JoistController::class, 'store'])->name('double_deep_typec2joists.store');
    
    Route::get('/double_deep_vigas_tipo_C2/calibre14/{id}', [DoubleDeepTypeC2JoistController::class, 'caliber14_show'])->name('double_deep_typec2joists_caliber14.show');
    Route::post('/double_deep_vigas_tipo_C2/calibre14', [DoubleDeepTypeC2JoistController::class, 'caliber14_calc'])->name('double_deep_typec2joists_caliber14.calc');

    Route::get('/double_deep_vigas_tipo_LR/{id}', [DoubleDeepTypeLRJoistController::class, 'show'])->name('double_deep_typelrjoists.show');
    Route::post('/double_deep_vigas_tipo_LR/', [DoubleDeepTypeLRJoistController::class, 'store'])->name('double_deep_typelrjoists.store');
    
    Route::get('/double_deep_vigas_tipo_LR/calibre14/{id}', [DoubleDeepTypeLRJoistController::class, 'caliber14_show'])->name('double_deep_typelrjoists_caliber14.show');
    Route::post('/double_deep_vigas_tipo_LR/calibre14', [DoubleDeepTypeLRJoistController::class, 'caliber14_calc'])->name('double_deep_typelrjoists_caliber14.calc');

    Route::get('/double_deep_vigas_tipo_Chair/{id}', [DoubleDeepTypeChairJoistController::class, 'show'])->name('double_deep_typechairjoists.show');
    Route::post('/double_deep_vigas_tipo_Chair/', [DoubleDeepTypeChairJoistController::class, 'store'])->name('double_deep_typechairjoists.store');
    
    Route::get('/double_deep_vigas_tipo_Chair/calibre14/{id}', [DoubleDeepTypeChairJoistController::class, 'caliber14_show'])->name('double_deep_typechairjoists_caliber14.show');
    Route::post('/double_deep_vigas_tipo_Chair/calibre14', [DoubleDeepTypeChairJoistController::class, 'caliber14_calc'])->name('double_deep_typechairjoists_caliber14.calc');

    Route::get('/double_deep_quotations/{id}', [QuotationController::class, 'doubledeep'])->name('double_deep_quotations.show');

    Route::get('/double_deep_panels/{id}', [PanelController::class, 'double_deep_panels'])->name('double_deep_panels');
    Route::get('/double_deep_two_in_joist_l_galvanized_panels/{id}', [PanelController::class, 'double_deep_two_in_joist_l_galvanized_panels'])->name('double_deep_two_in_joist_l_galvanized_panels');
    Route::get('/double_deep_two_in_joist_l_painted_panels/{id}', [PanelController::class, 'double_deep_two_in_joist_l_painted_panels'])->name('double_deep_two_in_joist_l_painted_panels');
    Route::get('/double_deep_two_point_five_in_joist_l_galvanized_panels/{id}', [PanelController::class, 'double_deep_two_point_five_in_joist_l_galvanized_panels'])->name('double_deep_two_point_five_in_joist_l_galvanized_panels');
    Route::get('/double_deep_two_point_five_in_joist_l_painted_panels/{id}', [PanelController::class, 'double_deep_two_point_five_in_joist_l_painted_panels'])->name('double_deep_two_point_five_in_joist_l_painted_panels');
    Route::get('/double_deep_chair_joist_galvanized_panels/{id}', [PanelController::class, 'double_deep_chair_joist_galvanized_panels'])->name('double_deep_chair_joist_galvanized_panels');
    Route::get('/double_deep_chair_joist_l_painted_panels/{id}', [PanelController::class, 'double_deep_chair_joist_l_painted_panels'])->name('double_deep_chair_joist_l_painted_panels');
    Route::post('/double_deep_two_in_joist_l_galvanized_panels/store', [PanelController::class, 'double_deep_two_in_joist_l_galvanized_panels_store'])->name('double_deep_two_in_joist_l_galvanized_panels.store');
    Route::post('/double_deep_two_in_joist_l_painted_panels/store', [PanelController::class, 'double_deep_two_in_joist_l_painted_panels_store'])->name('double_deep_two_in_joist_l_painted_panels.store');
    Route::post('/double_deep_two_point_five_in_joist_l_galvanized_panels/store', [PanelController::class, 'double_deep_two_point_five_in_joist_l_galvanized_panels_store'])->name('double_deep_two_point_five_in_joist_l_galvanized_panels.store');
    Route::post('/double_deep_two_point_five_in_joist_l_painted_panels/store', [PanelController::class, 'double_deep_two_point_five_in_joist_l_painted_panels_store'])->name('double_deep_two_point_five_in_joist_l_painted_panels.store');
    Route::post('/double_deep_chair_joist_galvanized_panels/store', [PanelController::class, 'double_deep_chair_joist_galvanized_panels_store'])->name('double_deep_chair_joist_galvanized_panels.store');
    Route::post('/double_deep_chair_joist_l_painted_panels/store', [PanelController::class, 'double_deep_chair_joist_l_painted_panels_store'])->name('double_deep_chair_joist_l_painted_panels.store');

    Route::get('/double_deep_grills/{id}', [GrillController::class, 'double_deep_grills_index'])->name('double_deep_grills.index');
    Route::post('/double_deep_grills/store', [GrillController::class, 'double_deep_grills_store'])->name('double_deep_grills.store');
    Route::get('/double_deep_woods/{id}', [WoodController::class, 'double_deep_woods_index'])->name('double_deep_woods.index');
    Route::post('/double_deep_woods/store', [WoodController::class, 'double_deep_woods_store'])->name('double_deep_woods.store');
    Route::get('/double_deep_special/{id}', [QuotationSpecialController::class, 'double_deep_special_index'])->name('double_deep_special.index');
    Route::post('/double_deep_special/store', [QuotationSpecialController::class, 'double_deep_special_store'])->name('double_deep_special.store');
    Route::get('/double_deep_administratives/{id}', [QuotationAdministrativeController::class, 'double_deep_administratives_index'])->name('double_deep_administratives.index');
    Route::post('/double_deep_administratives/store', [QuotationAdministrativeController::class, 'double_deep_administratives_store'])->name('double_deep_administratives.store');

    Route::get('/double_deep_protectors/{id}', [QuotationProtectorController::class, 'double_deep_protectors_index'])->name('double_deep_protectors.index');
    Route::get('/double_deep_protectors_create/{id}', [QuotationProtectorController::class, 'double_deep_protectors_create'])->name('double_deep_protectors.create');
    Route::post('/double_deep_protectors/store', [QuotationProtectorController::class, 'double_deep_protectors_store'])->name('double_deep_protectors.store');
    

    Route::get('/selectivo_freights/{id}', [FreightController::class, 'selectivo_show'])->name('selectivo_freights.show');
    Route::get('/selectivo_transports/{id}', [FreightController::class, 'selectivo_transports'])->name('selectivo_transports');
    Route::post('/selectivo_transports_add', [FreightController::class, 'selectivo_transports_add'])->name('selectivo_transports_add');
    Route::get('/selectivo_travel_assignments/{id}', [FreightController::class, 'selectivo_travel_assignments'])->name('selectivo_travel_assignments');
    Route::get('/selectivo_quotation_travel_assignments/{id}', [FreightController::class, 'selectivo_quotation_travel_assignments'])->name('selectivo_quotation_travel_assignments');
    Route::get('/selectivo_installs/{id}', [FreightController::class, 'selectivo_installs'])->name('selectivo_installs');
    Route::post('/selectivo_travel_assignments_add', [FreightController::class, 'selectivo_travel_assignments_add'])->name('selectivo_travel_assignments_add');
    Route::post('/selectivo_fiut_add', [FreightController::class, 'selectivo_fiut_add'])->name('selectivo_fiut_add');
    
    Route::get('/selectivo_panels/{id}', [PanelController::class, 'selectivo_panels'])->name('selectivo_panels');
    Route::get('/selectivo_two_in_joist_l_galvanized_panels/{id}', [PanelController::class, 'selectivo_two_in_joist_l_galvanized_panels'])->name('selectivo_two_in_joist_l_galvanized_panels');
    Route::get('/selectivo_two_in_joist_l_painted_panels/{id}', [PanelController::class, 'selectivo_two_in_joist_l_painted_panels'])->name('selectivo_two_in_joist_l_painted_panels');
    Route::get('/selectivo_two_point_five_in_joist_l_galvanized_panels/{id}', [PanelController::class, 'selectivo_two_point_five_in_joist_l_galvanized_panels'])->name('selectivo_two_point_five_in_joist_l_galvanized_panels');
    Route::get('/selectivo_two_point_five_in_joist_l_painted_panels/{id}', [PanelController::class, 'selectivo_two_point_five_in_joist_l_painted_panels'])->name('selectivo_two_point_five_in_joist_l_painted_panels');
    Route::get('/selectivo_chair_joist_galvanized_panels/{id}', [PanelController::class, 'selectivo_chair_joist_galvanized_panels'])->name('selectivo_chair_joist_galvanized_panels');
    Route::get('/selectivo_chair_joist_l_painted_panels/{id}', [PanelController::class, 'selectivo_chair_joist_l_painted_panels'])->name('selectivo_chair_joist_l_painted_panels');
    Route::get('/selectivo_protectors/{id}', [PanelController::class, 'selectivo_protectors'])->name('selectivo_protectors');
    Route::get('/selectivo_pair_bars_protectors/{id}', [PanelController::class, 'selectivo_pair_bars_protectors'])->name('selectivo_pair_bars_protectors');
    Route::post('/selectivo_two_in_joist_l_galvanized_panels/store', [PanelController::class, 'selectivo_two_in_joist_l_galvanized_panels_store'])->name('selectivo_two_in_joist_l_galvanized_panels.store');
    Route::post('/selectivo_two_in_joist_l_painted_panels/store', [PanelController::class, 'selectivo_two_in_joist_l_painted_panels_store'])->name('selectivo_two_in_joist_l_painted_panels.store');
    Route::post('/selectivo_two_point_five_in_joist_l_galvanized_panels/store', [PanelController::class, 'selectivo_two_point_five_in_joist_l_galvanized_panels_store'])->name('selectivo_two_point_five_in_joist_l_galvanized_panels.store');
    Route::post('/selectivo_two_point_five_in_joist_l_painted_panels/store', [PanelController::class, 'selectivo_two_point_five_in_joist_l_painted_panels_store'])->name('selectivo_two_point_five_in_joist_l_painted_panels.store');
    Route::post('/selectivo_chair_joist_galvanized_panels/store', [PanelController::class, 'selectivo_chair_joist_galvanized_panels_store'])->name('selectivo_chair_joist_galvanized_panels.store');
    Route::post('/selectivo_chair_joist_l_painted_panels/store', [PanelController::class, 'selectivo_chair_joist_l_painted_panels_store'])->name('selectivo_chair_joist_l_painted_panels.store');
    
    Route::get('/selectivo_grills/{id}', [GrillController::class, 'selectivo_grills_index'])->name('selectivo_grills.index');
    Route::post('/selectivo_grills/store', [GrillController::class, 'selectivo_grills_store'])->name('selectivo_grills.store');
    Route::get('/selectivo_woods/{id}', [WoodController::class, 'selectivo_woods_index'])->name('selectivo_woods.index');
    Route::post('/selectivo_woods/store', [WoodController::class, 'selectivo_woods_store'])->name('selectivo_woods.store');
    Route::get('/selectivo_special/{id}', [QuotationSpecialController::class, 'selectivo_special_index'])->name('selectivo_special.index');
    Route::post('/selectivo_special/store', [QuotationSpecialController::class, 'selectivo_special_store'])->name('selectivo_special.store');
    Route::get('/selectivo_administratives/{id}', [QuotationAdministrativeController::class, 'selectivo_administratives_index'])->name('selectivo_administratives.index');
    Route::post('/selectivo_administratives/store', [QuotationAdministrativeController::class, 'selectivo_administratives_store'])->name('selectivo_administratives.store');

    Route::get('/selectivo_protectors/{id}', [QuotationProtectorController::class, 'selectivo_protectors_index'])->name('selectivo_protectors.index');
    Route::get('/selectivo_protectors_create/{id}', [QuotationProtectorController::class, 'selectivo_protectors_create'])->name('selectivo_protectors.create');
    Route::post('/selectivo_protectors_store', [QuotationProtectorController::class, 'selectivo_protectors_store'])->name('selectivo_protectors.store');
    Route::get('/selectivo_protectors_edit/{id}', [QuotationProtectorController::class, 'selectivo_protectors_edit'])->name('selectivo_protectors.edit');
    Route::put('/selectivo_protectors_update/{id}', [QuotationProtectorController::class, 'selectivo_protectors_update'])->name('selectivo_protectors.update');
    Route::get('/selectivo_protectors_destroy/{id}', [QuotationProtectorController::class, 'selectivo_protectors_destroy'])->name('selectivo_protectors.destroy');

    Route::resource('quotation_installs', QuotationInstallController::class);
    Route::resource('quotation_uninstalls', QuotationUninstallController::class);

    Route::get('quotation_installs_double_deep_show/{id}', [QuotationInstallController::class, 'double_deep_show'])->name('quotation_installs_double_deep_show');
    Route::post('quotation_installs_double_deep_store', [QuotationInstallController::class, 'double_deep_store'])->name('quotation_installs_double_deep_store');
    
    Route::get('quotation_uninstalls_double_deep_show/{id}', [QuotationUninstallController::class, 'double_deep_show'])->name('quotation_uninstalls_double_deep_show');
    Route::post('quotation_uninstalls_double_deep_store', [QuotationUninstallController::class, 'double_deep_store'])->name('quotation_uninstalls_double_deep_store');

    Route::get('/double_deep_freights/{id}', [FreightController::class, 'double_deep_show'])->name('double_deep_freights.show');
    Route::get('/double_deep_transports/{id}', [FreightController::class, 'double_deep_transports'])->name('double_deep_transports');
    Route::post('/double_deep_transports_add', [FreightController::class, 'double_deep_transports_add'])->name('double_deep_transports_add');
    Route::get('/double_deep_travel_assignments/{id}', [FreightController::class, 'double_deep_travel_assignments'])->name('double_deep_travel_assignments');
    Route::get('/double_deep_quotation_travel_assignments/{id}', [FreightController::class, 'double_deep_quotation_travel_assignments'])->name('double_deep_quotation_travel_assignments');
    Route::get('/double_deep_installs/{id}', [FreightController::class, 'double_deep_installs'])->name('double_deep_installs');
    Route::post('/double_deep_travel_assignments_add', [FreightController::class, 'double_deep_travel_assignments_add'])->name('double_deep_travel_assignments_add');
    Route::post('/double_deep_fiut_add', [FreightController::class, 'double_deep_fiut_add'])->name('double_deep_fiut_add');

    Route::get('/singlepieces/{id}', [SinglePieceController::class, 'show'])->name('singlepieces.show');
    Route::post('/singlepieces/calc', [SinglePieceController::class, 'calc'])->name('singlepieces.calc');

    Route::get('/quotations/{id}', [QuotationController::class, 'show'])->name('quotations.show');
    Route::get('/rpt_rack_engineering/{id}', [QuotationController::class, 'rpt_rack_engineering'])->name('rpt_rack_engineering');
    Route::get('/quotations', [QuotationController::class, 'index'])->name('quotations');
    Route::get('/shopping_cart', [CartController::class, 'index'])->name('shopping_cart.index');
    
    Route::get('shopping_cart/get', [CartController::class, 'update'])->name('shopping_cart.get');
    Route::get('shopping_cart/delete/{id}', [CartController::class, 'destroy'])->name('shopping_cart.destroy');
    
    Route::get('shopping_cart/add_selectivo_protectors/{id}', [CartController::class, 'add_selectivo_protectors'])->name('shopping_cart.add_selectivo_protectors');
    Route::get('shopping_cart/add_selectivo_carga_pesada/{id}', [CartController::class, 'add_selectivo_carga_pesada'])->name('shopping_cart.add_selectivo_carga_pesada');
    Route::get('shopping_cart/add_selectivo_marcos_estructurales/{id}', [CartController::class, 'add_selectivo_marcos_estructurales'])->name('shopping_cart.add_selectivo_marcos_estructurales');
    Route::get('shopping_cart/add_selectivo_minimarcos/{id}', [CartController::class, 'add_selectivo_minimarcos'])->name('shopping_cart.add_selectivo_minimarcos');

    
    Route::get('shopping_cart/selectivo_floors/{id}', [FloorController::class, 'add_carrito'])->name('floors.add_carrito');

    Route::get('shopping_cart/selectivo_floor_reinforcements/{id}', [FloorReinforcementController::class, 'add_carrito'])->name('floor_reinforcements.add_carrito');
    
    Route::get('shopping_cart/selectivo_spacers/{id}', [SpacerController::class, 'add_carrito'])->name('spacers.add_carrito');
    


    Route::get('shopping_cart/add_selectivo_vigas_tipo_L_2/{id}', [TypeL2JoistController::class, 'add_carrito'])->name('typel2joists.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_L_2/calibre14/{id}', [TypeL2JoistController::class, 'add_carrito14'])->name('typel2joists_caliber14.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_L_2_5/{id}', [TypeL25JoistController::class, 'add_carrito'])->name('typel25joists.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_L_2_5/calibre14/{id}', [TypeL25JoistController::class, 'add_carrito14'])->name('typel25joists_caliber14.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_Box_2/{id}', [TypeBox2JoistController::class, 'add_carrito'])->name('typebox2joists.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_Box_2/calibre14/{id}', [TypeBox2JoistController::class, 'add_carrito14'])->name('typebox2joists_caliber14.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_Box_25/{id}', [TypeBox25JoistController::class, 'add_carrito'])->name('typebox25joists.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_Box_25/calibre14/{id}', [TypeBox25JoistController::class, 'add_carrito14'])->name('typebox25joists_caliber14.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_Structural/{id}', [TypeStructuralJoistController::class, 'add_carrito'])->name('typestructuraljoists.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_Structural/calibre14/{id}', [TypeStructuralJoistController::class, 'add_carrito14'])->name('typestructuraljoists_caliber14.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_C2/{id}', [TypeC2JoistController::class, 'add_carrito'])->name('typec2joists.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_C2/calibre14/{id}', [TypeC2JoistController::class, 'add_carrito14'])->name('typec2joists_caliber14.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_LR/{id}', [TypeLRJoistController::class, 'add_carrito'])->name('typelrjoists.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_LR/calibre14/{id}', [TypeLRJoistController::class, 'add_carrito14'])->name('typelrjoists_caliber14.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_Chair/{id}', [TypeChairJoistController::class, 'add_carrito'])->name('typechairjoists.add_carrito');
    Route::get('shopping_cart/add_selectivo_vigas_tipo_Chair/calibre14/{id}', [TypeChairJoistController::class, 'add_carrito14'])->name('typechairjoists_caliber14.add_carrito');

    // Route::get('shopping_cart/selectivo_freights/{id}', [FreightController::class, 'selectivo_show'])->name('selectivo_freights.show');
    // Route::get('shopping_cart/selectivo_transports/{id}', [FreightController::class, 'selectivo_transports'])->name('selectivo_transports');
    // Route::post('shopping_cart/selectivo_transports_add', [FreightController::class, 'selectivo_transports_add'])->name('selectivo_transports_add');
    // Route::get('shopping_cart/selectivo_travel_assignments/{id}', [FreightController::class, 'selectivo_travel_assignments'])->name('selectivo_travel_assignments');
    // Route::get('shopping_cart/selectivo_quotation_travel_assignments/{id}', [FreightController::class, 'selectivo_quotation_travel_assignments'])->name('selectivo_quotation_travel_assignments');
    // Route::get('shopping_cart/selectivo_installs/{id}', [FreightController::class, 'selectivo_installs'])->name('selectivo_installs');
    // Route::post('shopping_cart/selectivo_travel_assignments_add', [FreightController::class, 'selectivo_travel_assignments_add'])->name('selectivo_travel_assignments_add');
    // Route::post('shopping_cart/selectivo_fiut_add', [FreightController::class, 'selectivo_fiut_add'])->name('selectivo_fiut_add');
    
    Route::get('shopping_cart/selectivo_two_in_joist_l_galvanized_panels/{id}', [PanelController::class, 'selectivo_two_in_joist_l_galvanized_panels_add'])->name('selectivo_two_in_joist_l_galvanized_panels_add');
    Route::get('shopping_cart/selectivo_two_in_joist_l_painted_panels/{id}', [PanelController::class, 'selectivo_two_in_joist_l_painted_panels_ass'])->name('selectivo_two_in_joist_l_painted_panels_add');
    Route::get('shopping_cart/selectivo_two_point_five_in_joist_l_galvanized_panels/{id}', [PanelController::class, 'selectivo_two_point_five_in_joist_l_galvanized_panels_ass'])->name('selectivo_two_point_five_in_joist_l_galvanized_panels_add');
    Route::get('shopping_cart/selectivo_two_point_five_in_joist_l_painted_panels/{id}', [PanelController::class, 'selectivo_two_point_five_in_joist_l_painted_panels_ass'])->name('selectivo_two_point_five_in_joist_l_painted_panels_add');
    Route::get('shopping_cart/selectivo_chair_joist_galvanized_panels/{id}', [PanelController::class, 'selectivo_chair_joist_galvanized_panels_add'])->name('selectivo_chair_joist_galvanized_panels_add');
    Route::get('shopping_cart/selectivo_chair_joist_l_painted_panels/{id}', [PanelController::class, 'selectivo_chair_joist_l_painted_panels_add'])->name('selectivo_chair_joist_l_painted_panels_add');

    Route::get('shopping_cart/selectivo_crossbars/{id}', [CrossbarController::class, 'add_carrito'])->name('crossbars.add_carrito');
    Route::get('shopping_cart/selectivo_grills/{id}', [GrillController::class, 'add_carrito'])->name('selectivo_grills.add_carrito');
    Route::get('shopping_cart/selectivo_woods/{id}', [WoodController::class, 'add_carrito'])->name('selectivo_woods.add_carrito');
    Route::get('/shopping_cartselectivo_special/{id}', [QuotationSpecialController::class, 'add_carrito'])->name('selectivo_special.add_carrito');
    Route::get('shopping_cart/selectivo_administratives/{id}', [QuotationAdministrativeController::class, 'add_carrito'])->name('selectivo_administratives.add_carrito');
    
});

