<?php

namespace Phal {
    
    class Table extends ParentTag {
        
        private $internal_id;
        private $header_count;
        private $thead_tr;
        private $headers;
        private $tbody;
        private $rows;
        
        function __construct($caption) {
            parent::__construct("table");
            
            Text::check("Caption content", $caption);
            
            $this->internal_id = rand(0,9999)."_";
            $this->header_count = 0;
            
            $caption_tag = new SimpleParentTag("caption");
            $caption_tag->addChild($caption);
            
            parent::addChild($caption_tag);
            
            $thead = new SimpleParentTag("thead");
            $thead_tr = new SimpleParentTag("tr");
            $thead->addChild($thead_tr);
            
            $this->thead_tr = $thead_tr;
            
            $this->tbody = new SimpleParentTag("tbody");
            parent::addChild($this->tbody);
        }
        
        function addHeader($head) {
            $this->headers[] = $head;
            
            $tag = new SimpleParentTag("th");
            $tag->addChild($head);
            
            $this->thead_tr->addChild($tag);
        }
        
        function getHeaders() {
            return $this->headers;
        }
        
        function addRow($data) {
            $this->rows[] = $data;
        }
        
        function getRows() {
            return $this->rows;
        }
        
        function __toString() {
            $result = "";
            $result .= TagHelper::open("table");
            
            $result .= TagHelper::close("table");
        }
    }
}
