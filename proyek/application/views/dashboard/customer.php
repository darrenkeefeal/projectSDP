<?php
$tmpl = array(
    'table_open' => '<table class="table table-hover table-striped">'
);
$this->table->set_template($tmpl);
$this->table->set_heading('Nama Customer','Email','Alamat','No Telp','Config');
$tmp = array(
    'class' => 'btn btn-primary'
);
foreach($tambahan as $r) {
    $this->table->add_row($r->NAMA_CUSTOMER,$r->EMAIL_CUSTOMER,$r->ALAMAT_CUSTOMER.','.$r->KOTA_CUSTOMER,$r->NO_TELP_CUSTOMER,form_open('dashboard/customer').form_hidden('id',$r->ID_CUSTOMER).form_button('delete','Delete',array('class'=>'btn btn-primary','onclick'=>'confirmbox('.$r->ID_CUSTOMER.')')).form_submit('edit','Edit',$tmp).form_close());
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Master Customer</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <?php
                    echo $this->table->generate();
                    echo form_open();?>
                </div>
            </div>
        </div>
    </div>
</div>