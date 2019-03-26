# Magento2.3 - Admin Grid with Ui Component

<b>Module: Module_AdminGrid <br />
Url: admin > admingrid/customrule/index</b>

Tree
```
|-- README.md
-- app
    -- code
        -- Module
            -- AdminGrid
                |-- Controller
                |   -- Adminhtml
                |       -- CustomRule
                |           `-- Index.php
                |-- Model
                |   |-- CustomRule.php
                |   `-- ResourceModel
                |       |-- CustomRule
                |       |   `-- Collection.php
                |       `-- CustomRule.php
                |-- etc
                |   |-- acl.xml
                |   |-- adminhtml
                |   |   |-- menu.xml
                |   |   `-- routes.xml
                |   |-- db_schema.xml
                |   |-- di.xml
                |   `-- module.xml
                |-- registration.php
                `-- view
                    `-- adminhtml
                        |-- layout
                        |   `-- admingrid_customrule_index.xml
                        `-- ui_component
                            `-- admingrid_customrule_listing.xml

16 directories, 14 files
```

1. Create index action layout file: view/adminhtml/layout/admingrid_customrule_index.xml

     	1.1) For the action, admingrid/customrule/index, we will create a layout file name admingrid_customrule_index.xml
     	1.2) Here we will declare the uiComponent file for the content of grid page.
  
2. Create Component layout file(Ui Component xml file): view/adminhtml/ui_component/admingrid_customrule_listing.xml

       2.1) As declared in layout file, we will create a component file admingrid_customrule_listing.xml
       2.2) Here we will declare the grid layout and call data source/data provider.  
       2.3) Toolbar:  <listingToolbar name="listing_top">
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

3. Create di.xml file: etc/di.xml

       3.1) Here we will declaring Resource model, which will connect to the model and fetch the data to
         the custom Grid. 
          Also it will declare the Grid Collection class, table and resource Model for the table.
 

Note: declare(strict_types=1);

        1. Due to PHP7.2 and Magento 2.3 standards we have to use strict mode during development, so that means that for classes you need to add declare(strict_types=1);
            FAQ: Can we use this code in Production instance >>> Yes, Magento core, uses that mode as well. 