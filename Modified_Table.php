<?php
class Modified_Table extends WP_List_Table {
	public $data;
	public $columns;
	public $sortable;

	public function __construct( $data, $columns,$sortable ) {
		parent::__construct();

		$this->data    = $data;
		$this->columns = $columns;
		$this->sortable = $sortable;
	}

	public function prepare_items() {
		$columns  = $this->get_columns();
		$hidden   = $this->get_hidden_columns();
		$sortable = $this->get_sortable_columns();

		$data = $this->table_data( $this->data );
		usort( $data, array( &$this, 'sort_data' ) );

		$perPage     = 100;
		$currentPage = $this->get_pagenum();
		$totalItems  = count( $data );

		$this->set_pagination_args( array(
			'total_items' => $totalItems,
			'per_page'    => $perPage
		) );

		$data = array_slice( $data, ( ( $currentPage - 1 ) * $perPage ), $perPage );

		$this->_column_headers = array( $columns, $hidden, $sortable );
		$this->items           = $data;
	}

	public function get_columns() {
		$columns = $this->columns;

		return $columns;
	}

	public function get_hidden_columns() {
		return array();
	}

	public function get_sortable_columns() {
		$data = array();
		foreach ( $this->sortable as  $item ) {
			$data[$item] =  array($item, false);
		}
		return $data;
	}

	private function table_data( $data ) {
		return $data;
	}

	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {

			default:
				return $item[ $column_name ];
		}
	}


	private function sort_data( $a, $b ) {
		// Set defaults
		$orderby = 'title';
		$order   = 'asc';

		if ( ! empty( $_GET['orderby'] ) ) {
			$orderby = $_GET['orderby'];
		}


		if ( ! empty( $_GET['order'] ) ) {
			$order = $_GET['order'];
		}


		$result = strcmp( $a[ $orderby ], $b[ $orderby ] );

		if ( $order === 'asc' ) {
			return $result;
		}

		return - $result;
	}
}
?>