<?php

use Illuminate\Support\Facades\Route;


///control panel
use App\Livewire\Dashboard\HomeComponent;

//compaines
use App\Livewire\Dashboard\Company\AddCompanyComponent;
use App\Livewire\Dashboard\Company\EditCompanyComponent;
use App\Livewire\Dashboard\Company\ShowCompinesComponent;

///activities
use App\Livewire\Dashboard\Activity\CreateActivityComponent;
use App\Livewire\Dashboard\Activity\ShowActivityComponent;
use App\Livewire\Dashboard\Activity\EditActivityComponent;

///contact persons
use App\Livewire\Dashboard\Contactpersons\AddContactPersonComponent;
use App\Livewire\Dashboard\Contactpersons\EditContactPersonComponent;
use App\Livewire\Dashboard\Contactpersons\ShowContactPersonComponent;


/// response
use App\Livewire\Dashboard\ClientResponse\AddClientResponseComponent;
use App\Livewire\Dashboard\ClientResponse\EditClientRespnseComponent;
use App\Livewire\Dashboard\ClientResponse\ShowClientRespnseComponent;

/// following
use App\Livewire\Dashboard\Following\AddFollowingComponent;
use App\Livewire\Dashboard\Following\EditFollowingComponent;
use App\Livewire\Dashboard\Following\ShowFollowingComponent;
use App\Livewire\Dashboard\Following\TodayFollowing;

/// equipments

use App\Livewire\Dashboard\Equipment\ShowEquipmentComponent;
use App\Livewire\Dashboard\Equipment\EditEquipmentComponent;
use App\Livewire\Dashboard\Equipment\AddEquipmentComponent;
//// Brand Equipment
use App\Livewire\Dashboard\Equipment\Brands\AddBrandComponent;
use App\Livewire\Dashboard\Equipment\Brands\EditBrandComponent;
use App\Livewire\Dashboard\Equipment\Brands\ShowBrandComponent;




//// Indicator Equipment
use App\Livewire\Dashboard\Equipment\Indicator\AddIndicatorComponent;
use App\Livewire\Dashboard\Equipment\Indicator\EditIndicatorComponent;
use App\Livewire\Dashboard\Equipment\Indicator\ShowIndicatorComponent;

//// Type Equipment
use App\Livewire\Dashboard\Equipment\TypeTools\AddTypeToolsComponent;
use App\Livewire\Dashboard\Equipment\TypeTools\EditTypeToolsComponent;
use App\Livewire\Dashboard\Equipment\TypeTools\ShowTypeToolsComponent;



///recieve orders
use App\Livewire\Dashboard\RecieveEquipment\AddRecieveEquipmentComponent;
use App\Livewire\Dashboard\RecieveEquipment\EditRecieveEquipmentComponent;
use App\Livewire\Dashboard\RecieveEquipment\ShowRecieveEquipmentComponent;
use App\Livewire\Dashboard\RecieveEquipment\PrintRecieveComponent;


///sales man
use App\Livewire\Dashboard\Sales\AddSalesmanComponent;
use App\Livewire\Dashboard\Sales\EditSalesmanComponent;
use App\Livewire\Dashboard\Sales\ShowSalesmanComponent;



///complains
use App\Livewire\Dashboard\Compalins\AddComplainComponent;
use App\Livewire\Dashboard\Compalins\EditComplainComponent;
use App\Livewire\Dashboard\Compalins\ShowComplainComponent;
use App\Livewire\Dashboard\Compalins\AllDetailsComplainComponent;


///reports
use App\Livewire\Dashboard\Reports\ReportGeneratorComponent;
use App\Livewire\Dashboard\Reports\ReportPdfComponent;


// /// roles
// use App\Livewire\Dashboard\Roles\AddRolesComponent;
// use App\Livewire\Dashboard\Roles\EditRolesComponent;
// use App\Livewire\Dashboard\Roles\ShowRolesComponent;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', HomeComponent::class)->name("main_home");
    //company
    Route::get('/show-companies', ShowCompinesComponent::class)->name('show_company');
    Route::get('/add-company', AddCompanyComponent::class)->name('add_company');
    Route::get('company/edit/{companyId}',EditCompanyComponent::class)->name('edit_company');
    //activity
    Route::get('/add-activity', CreateActivityComponent::class)->name('add_activity');
    Route::get('/show-activities', ShowActivityComponent::class)->name('show_activity');
    Route::get('/activity/edit/{activityId}',EditActivityComponent::class)->name('edit_activity');
    ///contact person
    Route::get('/add-contact-person', AddContactPersonComponent::class)->name('add_contact');
    Route::get('/show-contact-persons', ShowContactPersonComponent::class)->name('show_contacts');
    Route::get('/contact-persons/edit/{id}', EditContactPersonComponent::class)->name('edit_contact_person');
    ///response
    Route::get('/client-responses', ShowClientRespnseComponent::class)->name('show_responses');
    Route::get('/client-responses/add', AddClientResponseComponent::class)->name('add_client_response');
    Route::get('/client-responses/edit/{id}', EditClientRespnseComponent::class)->name('edit_response');
    ///following
    Route::get('/client-followings', ShowFollowingComponent::class)->name('show_following');
    Route::get('/client-following/add', AddFollowingComponent::class)->name('add_following');
    Route::get('/client-followings/edit/{id}',EditFollowingComponent::class)->name('edit_following');
    Route::get('/todays-following', TodayFollowing::class)->name('todaysfollowing');

    ///equipments
    Route::get('/equipments', ShowEquipmentComponent::class)->name('show-equipment');
    Route::get('/add-equipment', AddEquipmentComponent::class)->name('add-equipment');
    Route::get('/edit-equipments/{id}', EditEquipmentComponent::class)->name('edit-equipment');
    ///brands equipments
    Route::get('/equipments/brands/', ShowBrandComponent::class)->name('show-brands');
    Route::get('/add-brand-equipment', AddBrandComponent::class)->name('add-brands');
    Route::get('/edit-brand-equipment/{brandId}', EditBrandComponent::class)->name('edit-brands');
    // Indicator Equipment
    Route::get('/equipments/indicators/', ShowIndicatorComponent::class)->name('show-Indicator');
    Route::get('/add-indicator-equipment', AddIndicatorComponent::class)->name('add-Indicator');
    Route::get('/edit-indicator-equipments/{indicatorId}', EditIndicatorComponent::class)->name('edit-Indicator');
    //// Type Equipment
    Route::get('/Type-equipments', ShowTypeToolsComponent::class)->name('show-Type-equipment');
    Route::get('/add-Type-equipment', AddTypeToolsComponent::class)->name('add-Type-equipment');
    Route::get('/edit-Type-equipments/{typeToolId}', EditTypeToolsComponent::class)->name('edit-Type-equipment');
    ////receive-orders
    Route::get('/dashboard/receive-orders', ShowRecieveEquipmentComponent::class)->name('show-receive-equipment');
    Route::get('/dashboard/receive-orders/add', AddRecieveEquipmentComponent::class)->name('add-receive-equipment');
    Route::get('/dashboard/receive-orders/edit/{id}', EditRecieveEquipmentComponent::class)->name('edit-receive-equipment');
    Route::get('/dashboard/receive-order-details/{id}', PrintRecieveComponent::class)->name('print_order');


    ///salesman
    Route::get('/sales-man', ShowSalesmanComponent::class)->name('show_sales');
    Route::get('/sales-man/add', AddSalesmanComponent::class)->name('add_sales');
    Route::get('/sales-man/edit/{id}',EditSalesmanComponent::class)->name('edit_sales');

    ///complains
    Route::get('/complain', ShowComplainComponent::class)->name('show_complains');
    Route::get('/complain/add', AddComplainComponent::class)->name('add_complains');
    Route::get('/complain/edit/{id}',EditComplainComponent::class)->name('edit_complains');
    Route::get('/complain/details/{id}', AllDetailsComplainComponent::class)->name('details_complain');

    ///reports
    Route::get('/pdf-receive-orders', [ShowRecieveEquipmentComponent::class, 'generatePdf'])->name('pdf-receive-orders');

    // ///roles
    // Route::get('/roles/add', AddRolesComponent::class)->name('add_role');
    // Route::get('/roles/edit/{roleId}', EditRolesComponent::class)->name('edit_role');
    // Route::get('/roles', ShowRolesComponent::class)->name('show_roles');
});

