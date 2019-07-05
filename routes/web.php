<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/**Multiple login start here */
Auth::routes();
$this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('admin/login', 'Auth\LoginController@login');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/privileges', 'Admin\RolesController');
Route::post('admin/privileges/changeStatus', 'Admin\RolesController@changeStatus')->name('privileges.status');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::get('admin/teams/search', 'Admin\UsersController@search')->name('teams.search');
Route::resource('admin/teams', 'Admin\UsersController');

Route::post('admin/teams/addTeam', 'Admin\UsersController@store')->name('teams.post');
Route::post('admin/teams/changeStatus', 'Admin\UsersController@changeStatus')->name('teams.status');
Route::post('admin/teams/{id}/edit', 'Admin\UsersController@update');
Route::get('admin/teams/{id}/destroy', 'Admin\UsersController@destroy');
Route::get('admin/teams/{id}/permissions', 'Admin\UsersController@permissionIndex');
Route::post('admin/teams/{id}/permissions', 'Admin\UsersController@updatePermission');
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::resource('admin/settings', 'Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
/**Multiple login end here */

/*------End Routes For Service Team Login------*/
Route::get('admin/inventry/products/issueProducts','ProductController@listJobs')->name('product.issue');
Route::get('admin/inventry/products/ajaxDateJobs','ProductController@listDates')->name('ajaxDateJobs.dt');
Route::get('admin/inventry/products/ajaxAllotedDateJobs','ProductController@ajaxAllotedDateJobs')->name('dates.ajaxDateJobs');
Route::post('admin/inventry/products/getAllJobAjax','ProductController@getAllJobAjax')->name('assigned.product');
Route::get('admin/inventry/products/requestInventory/{id}','ProductController@requestInventory');
Route::post('admin/inventry/products/requestInventory/{id}', 'ProductController@addrequestedProduct');

Route::get('admin/newjobs','OrderController@requestedJobs')->name('new.jobs');
Route::get('/admin/newjobs/{id}/jobCard', 'OrderController@jobCard');
Route::get('/admin/newjobs/ajaxjobCard', 'OrderController@ajaxjobCard')->name('ajaxjobCard.job');
Route::post('/admin/newjobs/{id}/jobCard', 'OrderController@storeJobCard');
Route::get('admin/newjobs/{id}/viewJobCard','OrderController@view');
Route::get('/admin/newjobs/{id}/reports', 'OrderController@jobsReport');
Route::post('/admin/newjobs/{id}/reports', 'OrderController@sendjobsReport');
Route::get('admin/newjobs/{id}/viewProposal','OrderController@viewjobProposal');


Route::get('admin/innegotiationjobs','OrderController@inNegotiationJobs')->name('jobs.inNegotitation');
Route::post('admin/innegotiationjobs/getAllJobAjax','OrderController@getAllJobAjax')->name('negotiate.jobs');

/*------End Routes For Service Team Login------*/

/*------Start Routes For admin------*/
Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');
Route::get('admin/services', 'ServiceController@index')->name('admin.services');
Route::get('admin/services/search', 'ServiceController@search')->name('services.search');
Route::post('admin/services/changeStatus', 'ServiceController@changeStatus')->name('services.active');
Route::get('admin/services/addService', 'ServiceController@create')->name('services.form');
Route::post('admin/services/addService','ServiceController@store')->name('services.post');
Route::post('admin/services/statusActive', 'ServiceController@statusActive')->name('subservices.active');
Route::get('admin/services/{id}','ServiceController@edit');
Route::post('admin/services/{id}','ServiceController@updateservice')->name('services.edit');
Route::get('admin/services/destroy/{id}','ServiceController@destroy')->name('service.destroy');
Route::get('admin/services/{id}/subServices', 'ServiceController@viewSubServices');
Route::get('admin/services/{id}/subServiceSearch', 'ServiceController@subServiceSearch')->name('subservices.search');
Route::get('admin/services/{id}/addSubService','ServiceController@createSubService');
Route::post('admin/services/{id}/addSubService','ServiceController@storeSubService')->name('subservice.post');
Route::get('admin/services/{id}/editSubSErvice/{subservice_id}','ServiceController@editSubService');
Route::post('admin/services/{id}/editSubSErvice/{subservice_id}','ServiceController@updateSubService');
Route::get('admin/services/destroySubService/{id}','ServiceController@destroySubService')->name('service.destroySubService');


Route::get('admin/employees', 'EmployeeController@index')->name('admin.employee');
Route::get('admin/employees/search', 'EmployeeController@search')->name('employees.search');
Route::get('admin/employees/addEmployee','EmployeeController@create')->name('employee.form');
Route::post('admin/employees/addEmployee','EmployeeController@store')->name('employee.post');
Route::get('admin/employees/destroy/{id}', 'EmployeeController@destroy')->name('employee.destroy');
Route::get('admin/employees/editEmployee/{id}', 'EmployeeController@edit');
Route::post('admin/employees/update/{id}', 'EmployeeController@update');
Route::get('admin/employees/employeeProfile/{id}','EmployeeController@empProfile');
Route::get('admin/employees/orderList/{id}','EmployeeController@orderLIst');
Route::post('admin/employees/getAllteamsizesajax','EmployeeController@getAllteamsizesajax')->name('teamSize.ajaxteam');
Route::get('admin/employees/orderJobDetails/{id}/{order_id}','EmployeeController@jobDetails');

Route::get('admin/slots', 'SlotController@index')->name('admin.slots');
Route::post('admin/slots/addSlot','SlotController@store')->name('slots.post');
Route::post('admin/slots/getAllslotsajax','SlotController@getAllslotsajax')->name('slots.ajaxslots');
Route::post('admin/slots/blockslot','SlotController@blockslot')->name('slots.blockslot');
Route::post('admin/slots/blockDate','SlotController@blockDate')->name('slots.blockDate');

Route::get('admin/otherCharges', 'ServiceController@othercharges')->name('admin.other');
Route::post('admin/otherCharges/updateCharges','ServiceController@chargeupdate')->name('chargeupdate.post');

Route::get('admin/users', 'UserController@index')->name('admin.users');
Route::get('admin/users/search', 'UserController@search')->name('users.search');
Route::get('admin/users/userDetails/{id}', 'UserController@show')->name('users.details');

Route::get('admin/margins','MarginController@index')->name('admin.margin');
Route::get('admin/margins/addMargin','MarginController@create')->name('margin.form');
Route::post('admin/margins/addMargin','MarginController@store')->name('margin.post');
Route::get('admin/margins/destroy/{id}', 'MarginController@destroy');

Route::get('admin/brands','BrandController@index')->name('admin.brands');
Route::get('admin/brands/search', 'BrandController@search')->name('brands.search');
Route::get('admin/brands/addBrand','BrandController@create')->name('brands.form');
Route::post('admin/brands/addBrand','BrandController@store')->name('brands.post');
Route::get('admin/brands/edit/{id}','BrandController@edit');
Route::post('admin/brands/edit/{id}','BrandController@update');
Route::get('admin/brands/destroy/{id}', 'BrandController@destroy');

Route::get('admin/categories','ProductCatController@index')->name('admin.categories');
Route::get('admin/categories/search', 'ProductCatController@search')->name('categories.search');
Route::get('admin/categories/addCategory','ProductCatController@create')->name('categories.form');
Route::post('admin/categories/addCategory','ProductCatController@store')->name('categories.post');
Route::get('admin/categories/edit/{id}','ProductCatController@edit');
Route::post('admin/categories/edit/{id}','ProductCatController@update');
Route::get('admin/categories/destroy/{id}', 'ProductCatController@destroy');
Route::post('admin/categories/isActive', 'ProductCatController@isActive')->name('categories.status');
Route::get('admin/categories/getajaxSubServicedata', 'ProductCatController@getajaxSubServicedata');

Route::get('admin/contracts','PackageController@index')->name('admin.contracts');
Route::get('admin/contracts/addContractServices','PackageController@create')->name('contracts.form');
Route::post('admin/contracts/addContractServices','PackageController@store')->name('contracts.post');
Route::get('admin/contracts/editContractServices/{id}','PackageController@edit');
Route::post('admin/contracts/editContractServices/{id}','PackageController@update');
Route::get('admin/contracts/deleteContactServices/{id}', 'PackageController@deleteContactServices');
Route::get('admin/contracts/destroy/{id}', 'PackageController@destroy');
Route::get('admin/contracts/packagedata', 'PackageController@getajaxpackagedata');
Route::get('admin/contracts/contractList','PackageController@allContracts')->name('contracts.all');
Route::get('admin/contracts/addContract','PackageController@createPackage')->name('contracts.fp');
Route::get('admin/contracts/editContract/{id}', 'PackageController@editContract');
Route::post('admin/contracts/editContract/{id}', 'PackageController@updateContract');
Route::get('admin/contracts/destroyContract/{id}', 'PackageController@destroyContract');
Route::post('admin/contracts/addContract','PackageController@storePackage')->name('package_form.post');
Route::get('admin/contracts/listContractCategory','PackageController@listCategory')->name('contracts.allcategory');
Route::get('admin/contracts/addContractCategory','PackageController@createCategory')->name('contracts.category');
Route::get('admin/contracts/editContractCategory/{id}', 'PackageController@editCategory');
Route::post('admin/contracts/editContractCategory/{id}', 'PackageController@updateCategory');
Route::post('admin/contracts/addContractCategory','PackageController@storeCategory')->name('category.post');
Route::get('admin/contracts/delete/{id}', 'PackageController@delete');

Route::get('admin/banners','BannerController@index')->name('admin.banners');
Route::get('admin/banners/addBanner','BannerController@create')->name('banners.add');
Route::post('admin/banners/addBanner','BannerController@store')->name('banners.post');
Route::get('admin/banners/editBanner/{id}','BannerController@edit');
Route::get('admin/banners/destroy/{id}', 'BannerController@destroy')->name('banners.destroy');
Route::post('admin/banners/editBanner/{id}','BannerController@updateservice');

Route::get('admin/vehicles','VehicleController@index')->name('admin.vehiclelist');
Route::get('admin/vehicles/search','VehicleController@search')->name('vehicles.search');
Route::get('admin/vehicles/addVehicle','VehicleController@create')->name('vehicle.form');
Route::post('admin/vehicles/addVehicle','VehicleController@store')->name('vehicle.post');
Route::get('admin/vehicles/vehicleOrderList/{id}','VehicleController@vehicleOrder');
Route::post('admin/vehicles/ajaxEmployeeList','VehicleController@vehicleJobEmployee')->name('vehicles.ajaxEmp');
Route::get('admin/vehicles/viewVehicle/{id}','VehicleController@vehicleInfo');
Route::get('admin/vehicles/destroy/{id}', 'VehicleController@destroy');
Route::get('admin/vehicles/editVehicle/{id}', 'VehicleController@edit');
Route::post('admin/vehicles/update/{id}', 'VehicleController@update');

Route::get('admin/orders/groups','GroupController@index')->name('admin.groups');
Route::get('admin/orders/groups/search', 'GroupController@search')->name('groups.search');
Route::get('admin/orders/groups/addGroup','GroupController@create')->name('groups.form');
Route::post('admin/orders/groups/addGroup','GroupController@store')->name('groups.post');
Route::post('admin/orders/groups/getAllGroupsAjax','GroupController@getAllGroupsAjax')->name('groups.ajaxgroups');
Route::get('admin/orders/groups/destroy/{id}','GroupController@destroy')->name('groups.delete');
Route::get('admin/orders/groups/editGroup/{id}', 'GroupController@edit');
Route::post('admin/orders/groups/update/{id}', 'GroupController@update');

Route::get('admin/orders','OrderController@index')->name('admin.orders');
Route::get('admin/orders/search','OrderController@search')->name('orders.search');
Route::post('admin/orders/filter','OrderController@filter')->name('orders.filter');
Route::get('admin/orders/addOrder','OrderController@create')->name('orders.form');
Route::post('admin/orders/statusFilter','OrderController@statusFilter')->name('orders.statusFilter');
Route::get('admin/orders/activeOrders','OrderController@listOrders')->name('orders.activeOrders');

Route::get('admin/orders/jobs','OrderController@jobsIndex')->name('orders.jobs');
Route::get('admin/orders/jobSearch','OrderController@jobsSearch')->name('orders.jobSearch');
Route::post('admin/orders/jobFilter','OrderController@jobsfilter')->name('orders.jobFilter');
Route::post('admin/orders/jobsStatusFilter','OrderController@jobsStatusFilter')->name('orders.jobsStatusFilter');

Route::get('admin/orders/approvedOrders','OrderController@approvedOrders')->name('orders.approved');
Route::post('admin/orders/getallApprovedAjax','OrderController@getallApprovedAjax')->name('orders.approvedAjax');
Route::get('admin/orders/allotedOrders','OrderController@allotedOrders')->name('orders.alloted');
Route::post('admin/orders/getallAllotedAjax','OrderController@getallAllotedAjax')->name('orders.allotedAjax');
Route::get('admin/orders/orderDetails/{id}','OrderController@show');
Route::get('admin/orders/viewOrder/{id}','OrderController@viewOrder');
/** new functionality added start */
Route::post('admin/orders/sendProposal/{id}','OrderController@sendProposal');
Route::get('admin/orders/viewProposal/{id}','OrderController@viewProposal');
Route::post('admin/orders/updateProposal/{id}','OrderController@updateProposal');
Route::get('admin/orders/isReject','OrderController@isRejectAjax')->name('isReject.get');
/** new functionality added end */
Route::post('admin/orders/allGroupsAjax','OrderController@allGroupsAjax')->name('orders.ajaxgroups');
Route::post('admin/orders/allotGroup','OrderController@allotGroup')->name('orders.allotGroup');
Route::get('admin/orders/employeedata', 'OrderController@getajaxEmployeedata');
Route::post('admin/orders/getAllotedserviceTypeAjax','OrderController@getAllotedserviceTypeAjax')->name('orders.ajaxType');
Route::post('admin/orders/getallFilterAjax','OrderController@getallFilterAjax')->name('orders.filterAjax');
Route::post('admin/orders/filterDropDOwnAjax','OrderController@filterDropDOwnAjax')->name('orders.filterDropDOwnAjax');


Route::get('admin/surveyers','JobController@index')->name('admin.surveyers');
Route::post('admin/surveyers/getAllJObsAjax','JobController@getAllJObsAjax')->name('surveyers.ajaxjobs');
Route::post('admin/surveyers/getSurveyorserviceTypeAjax','JobController@getSurveyorserviceTypeAjax')->name('surveyers.ajaxServiceTYpe');
Route::post('admin/surveyers/getAllSurveyerSlotAjax','JobController@getAllSurveyerSlotAjax')->name('surveyers.slotAjax');
Route::post('admin/surveyers/assignSurveyer','JobController@store')->name('surveyers.post');

Route::get('admin/surveyers/scheduleSurveyers','SurveyerController@index')->name('surveyers.scheduleSurveyers');
Route::post('admin/surveyers/getAllSurveyorAjax','SurveyerController@getAllSurveyorAjax')->name('surveyers.ajaxSchedule');
Route::get('admin/surveyers/allSurveys','SurveyerController@getAllSurveys')->name('surveys.all');
Route::get('admin/surveyers/surveyDetail','SurveyerController@show')->name('detail.view');
Route::post('admin/surveyers/getAllProposedAjax','SurveyerController@getAllProposedAjax')->name('surveyers.proposedAjax');
Route::get('admin/surveyers/jobs/{id}','SurveyerController@edit')->name('report.add');
Route::post('admin/surveyers/jobs/addSurveyReport','SurveyerController@store')->name('comment.post');

Route::get('admin/surveyers/schudle','SurveyerController@schudlelist')->name('surveyers.schudle');

Route::get('admin/inventry/products','ProductController@index')->name('admin.products');
Route::get('admin/inventry/products/search','ProductController@search')->name('products.search');
Route::post('admin/inventry/products/filterByAjax','ProductController@filterByAjax');
Route::get('admin/inventry/products/issueProducts/{id}','ProductController@issueProduct');
Route::get('admin/inventry/products/getajaxProdata', 'ProductController@getajaxProductddata');
Route::get('admin/inventry/products/ajaxproductdata', 'ProductController@getajaxProductdata');
Route::post('admin/inventry/products/issueProducts/{id}', 'ProductController@addissueProduct');
Route::get('admin/inventry/products/ajaxCategorydata', 'ProductController@getajaxCatdata');
Route::get('admin/inventry/products/addProduct','ProductController@create')->name('products.add');
Route::post('admin/inventry/products/addProduct','ProductController@store')->name('products.post');
Route::get('admin/inventry/products/{id}','ProductController@edit');
Route::post('admin/inventry/products/{id}','ProductController@update');
Route::get('admin/inventry/products/{id}/view','ProductController@show');
Route::get('admin/inventry/products/destroy/{id}','ProductController@destroy');



Route::get('admin/quries','EnquiryController@index')->name('admin.quries');
Route::get('admin/quries/search', 'EnquiryController@search')->name('quries.search');

Route::get('admin/vendors','VendorController@index')->name('admin.vendors');
Route::get('admin/vendors/search', 'VendorController@search')->name('vendors.search');
Route::get('admin/vendors/vendorRegistration','VendorController@create')->name('vendors.form');
Route::post('admin/vendors/vendorRegistration','VendorController@store')->name('vendors.post');
Route::get('admin/vendors/{id}/edit','VendorController@edit');
Route::post('admin/vendors/edit/{id}','VendorController@update');
Route::get('admin/vendors/{id}/view','VendorController@show');
Route::get('admin/vendors/{id}/destroy','VendorController@destroy');
Route::get('admin/vendors/{id}/destroyServices','VendorController@destroyServices');
Route::post('admin/vendors/filterAjax','VendorController@filterAjax')->name('vendors.filter');


Route::get('admin/invoice/jobs','InvoiceController@index')->name('admin.invoice');
Route::get('admin/invoice/view/{id}','InvoiceController@show');
/*------End Routes For admin------*/






