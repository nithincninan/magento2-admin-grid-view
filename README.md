# Admin Grid in Magento2.3

Module: Module_AdminGrid
Url: admin > module_admingrid/customrule/index

1. Create index action layout file: view/adminhtml/layout/module_admingrid_customrule_index.xml
   
   >>>> 1.1) For the action, module_admingrid/customrule/index, we will create a layout file name module_admingrid_customrule_index.xml
        1.2) Here we will declare the uiComponent file for the content of grid page. 
  
2. Create Component layout file(Ui Component xml file): view/adminhtml/ui_component/module_admingrid_customrule_listing.xml

    >>>> 2.1) As declared in layout file, we will create a component file module_admingrid_customrule_listing.xml
         2.2) Toolbar: <listingToolbar name="listing_top">
                       <settings>
                       <sticky>true</sticky>
                       </settings>
                       <bookmark name="bookmarks"/>
                       <columnsControls name="columns_controls"/>
                       <filters name="listing_filters"/>
                       <paging name="listing_paging"/>
                       </listingToolbar>
                1) Paging(add pagination for the grid): Insert <paging name="listing_paging"/> in ListToolbar <listingToolbar name="listing_top">
                2) Export Button(export the data of the grid): Insert <exportButton name="export_button"/> in ListToolbar <listingToolbar name="listing_top">
                3) Full text search(add a search box at the top of Grid): <filterSearch name="fulltext"/> in ListToolbar
                4) Column controls(add a columns list box which allow the admin user can choose which columns can be shown up on grid):
                       <columnsControls name="columns_controls"/>
         2.3) Here we will declare the grid layout and call data source/data provider.        
                       

3. Create di.xml file: etc/di.xml

    >>>> 