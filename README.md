# Custom-WP-Table

## a simple file to paste in your plugin / theme to use WP-Table

### **Instruction:** Paste file in your desired location and use below code:

```php
$modified_table = new Modified_Table( $data, $columns ,$sortable);
$modified_table->prepare_items();
$modified_table->display();
```

Example data:
```php
$columns = [
'id'      => 'ID',
'image'   => 'Image',
'name'    => 'Name',
'watt'    => 'Watt',
'actions' => 'Actions'
];  

$data = [
    [
        'watt'       => 0,
        'id'         => 1,
        'image'      => 'locahost/icon.svg',
        'name'       => "Product Name",
        'actions'    => '<a href="#action">Action</a>'
    ],
    [
        'watt'       => 0,
        'id'         => 2,
        'image'      => 'locahost/icon.svg',
        'name'       => "Product Name #2",
        'actions'    => '<a href="#action">Action</a>'
    ]
];
$sortable = array( 'id', 'name', 'actions', 'watt' )
```                                                    