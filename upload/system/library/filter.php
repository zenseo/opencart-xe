<?php

class Filter {
    private $request = null;

    public function __construct($request=null) {
        $this->request = $request;
    }

    
    public function getFilters() {
        $filters = array();
        
      
        if (isset($this->request->get['filter_name'])) {
			$filters['filter_name'] = $this->request->get['filter_name'];
		} else {
			$filters['filter_name'] = null;
		}

		if (isset($this->request->get['filter_model'])) {
			$filters['filter_model'] = $this->request->get['filter_model'];
		} else {
			$filters['filter_model'] = null;
		}

		if (isset($this->request->get['filter_price'])) {
			$filters['filter_price'] = $this->request->get['filter_price'];
		} else {
			$filters['filter_price'] = null;
		}

		if (isset($this->request->get['filter_quantity'])) {
			$filters['filter_quantity'] = $this->request->get['filter_quantity'];
		} else {
			$filters['filter_quantity'] = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filters['filter_status'] = $this->request->get['filter_status'];
		} else {
			$filters['filter_status'] = null;
		}

		if (isset($this->request->get['sort'])) {
			$filters['sort'] = $this->request->get['sort'];
		} else {
			$filters['sort'] = 'pd.name';
		}

		if (isset($this->request->get['order'])) {
			$filters['order'] = $this->request->get['order'];
		} else {
			$filters['order'] = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$filters['page'] = $this->request->get['page'];
		} else {
			$filters['page'] = 1;
		}

        return $filters;
    }

   

}
