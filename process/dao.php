<?php

/**j
 * 
 * @param type $conn
 */
function checkLogin($username, $password)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $obj = 0;
    $query = "call check_login('$username','$password')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if ($row = mysqli_fetch_array($result)) {
        $obj = $row['id'];
    }

    mysqli_close($conn);
    return ($obj);
}
// echo checkLogin('admin','admin');

function insertUsers($uuid, $en_firstname, $en_lastname, $ar_firstname, $ar_lastname, $email, $upassword, $user_level, $created_by, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_users('$uuid','$en_firstname','$en_lastname','$ar_firstname','$ar_lastname','$email','$upassword','$user_level','$created_by','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function updateUsers($id, $en_firstname, $en_lastname, $ar_firstname, $ar_lastname, $email, $upassword, $user_level, $updated_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call update_users('$id','$en_firstname','$en_lastname','$ar_firstname','$ar_lastname','$email','$upassword','$user_level','$updated_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function changePassword($id, $newpassword)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call change_password('$id','$newpassword')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function listUsers()
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_users()";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "uuid" => $row['uuid'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "ar_firstname" => $row['ar_firstname'],
            "ar_lastname" => $row['ar_lastname'],
            "email" => $row['email'],
            "upassword" => $row['upassword'],
            "user_level" => $row['user_level'],
            "status" => $row['status']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function getUserDetailsById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $outputarray = array();

    $query = "call get_user_details_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    // echo($result);

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "ar_firstname" => $row['ar_firstname'],
            "ar_lastname" => $row['ar_lastname'],
            "email" => $row['email'],
            "upassword" => $row['upassword'],
            "user_level" => $row['user_level']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listUsersById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_users_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "uuid" => $row['uuid'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "ar_firstname" => $row['ar_firstname'],
            "ar_lastname" => $row['ar_lastname'],
            "email" => $row['email'],
            "upassword" => $row['upassword'],
            "user_level" => $row['user_level']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function changeUserStatus($id, $status)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $sql = "call change_user_status('$id','$status')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function insertClients($en_firstname, $en_lastname, $ar_firstname, $ar_lastname, $en_phone_no, $en_landline, $en_address, $ar_phone_no, $ar_landline, $ar_address, $email, $en_com_name, $ar_com_name, $tax_no, $created_by, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_clients('$en_firstname','$en_lastname','$ar_firstname','$ar_lastname','$en_phone_no','$en_landline','$en_address','$ar_phone_no','$ar_landline','$ar_address','$email','$en_com_name','$ar_com_name','$tax_no','$created_by','$created_on')";


    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}
// echo insertClients('assa','sd','dfjjfdsj','dfsiojjofds','dsds','dfdsf','dsdfs','dfdfs','dfsfds','dsfdf','fddfs','7','huiui','dsfdfs','uifewij','sfddf');
function updateClients($id, $en_firstname, $en_lastname, $ar_firstname, $ar_lastname, $en_phone_no, $en_landline, $en_address, $ar_phone_no, $ar_landline, $ar_address, $email, $en_com_name, $ar_com_name, $tax_no, $updated_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call update_clients('$id','$en_firstname','$en_lastname','$ar_firstname','$ar_lastname','$en_phone_no','$en_landline','$en_address','$ar_landline','$ar_phone_no','$ar_address','$email','$en_com_name','$ar_com_name','$tax_no','$updated_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}


function listClients()
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_clients()";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "ar_firstname" => $row['ar_firstname'],
            "ar_lastname" => $row['ar_lastname'],
            "en_phone_no" => $row['en_phone_no'],
            "en_landline" => $row['en_landline'],
            "en_address" => $row['en_address'],
            "ar_phone_no" => $row['ar_phone_no'],
            "ar_landline" => $row['ar_landline'],
            "ar_address" => $row['ar_address'],
            "email" => $row['email'],
            "en_com_name" => $row['en_com_name'],
            "ar_com_name" => $row['ar_com_name'],
            "tax_no" => $row['tax_no'],
            "status" => $row['status']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}


function listClientsById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_clients_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "ar_firstname" => $row['ar_firstname'],
            "ar_lastname" => $row['ar_lastname'],
            "en_phone_no" => $row['en_phone_no'],
            "en_landline" => $row['en_landline'],
            "en_address" => $row['en_address'],
            "ar_phone_no" => $row['ar_phone_no'],
            "ar_landline" => $row['ar_landline'],
            "ar_address" => $row['ar_address'],
            "email" => $row['email'],
            "en_com_name" => $row['en_com_name'],
            "ar_com_name" => $row['ar_com_name'],
            "tax_no" => $row['tax_no']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function changeClientStatus($id, $status)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $sql = "call change_client_status('$id','$status')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function insertVendors($en_vname, $en_address, $en_phone, $en_email, $en_company_name, $ar_vname, $ar_address, $ar_phone, $ar_company_name, $vat_id, $created_by, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_vendors('$en_vname','$en_address','$en_phone','$en_email','$en_company_name','$ar_vname','$ar_address','$ar_phone','$ar_company_name','$vat_id','$created_by','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function updateVendors($id, $en_vname, $en_address, $en_phone, $en_email, $en_company_name, $ar_vname, $ar_address, $ar_phone, $ar_company_name, $vat_id, $updated_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call update_vendors('$id','$en_vname','$en_address','$en_phone','$en_email','$en_company_name','$ar_vname','$ar_address','$ar_phone','$ar_company_name','$vat_id','$updated_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

// echo (updateVendors(4,'df','erwr','dsffd','dfdfd','sdfdfs','fdsdfs','dfsdf','dfsd','erw','sfdfd','sfdc','dfdsf','ggg'));

function changeVendorStatus($id, $status)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $sql = "call change_vendor_status('$id','$status')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function listVendors()
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_vendors()";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_vname" => $row['en_vname'],
            "en_address" => $row['en_address'],
            "en_contact_person" => $row['en_contact_person'],
            "ar_vname" => $row['ar_vname'],
            "ar_address" => $row['ar_address'],
            "ar_contact_person" => $row['ar_contact_person'],
            "vat_id" => $row['vat_id'],
            "status" => $row['status'],
            "en_phone" => $row['en_phone'],
            "en_email" => $row['en_email'],
            "en_company_name" => $row['en_company_name'],
            "ar_phone" => $row['ar_phone'],
            "ar_company_name" => $row['ar_company_name']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listVendorsById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_vendors_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_vname" => $row['en_vname'],
            "en_address" => $row['en_address'],
            "en_contact_person" => $row['en_contact_person'],
            "ar_vname" => $row['ar_vname'],
            "ar_address" => $row['ar_address'],
            "ar_contact_person" => $row['ar_contact_person'],
            "vat_id" => $row['vat_id'],
            "en_phone" => $row['en_phone'],
            "en_email" => $row['en_email'],
            "en_company_name" => $row['en_company_name'],
            "ar_phone" => $row['ar_phone'],
            "ar_company_name" => $row['ar_company_name']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function insertProducts($en_pname, $ar_pname, $en_description, $ar_description, $created_by, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_products('$en_pname','$ar_pname','$en_description','$ar_description','$created_by','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function updateProducts($id, $en_pname, $ar_pname, $en_description, $ar_description, $updated_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call update_products('$id','$en_pname','$ar_pname','$en_description','$ar_description','$updated_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}


function listProducts()
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_products()";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_pname" => $row['en_pname'],
            "ar_pname" => $row['ar_pname'],
            "en_description" => $row['en_description'],
            "ar_description" => $row['ar_description'],
            "status" => $row['status']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}


function listProductsById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_products_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_pname" => $row['en_pname'],
            "ar_pname" => $row['ar_pname'],
            "en_description" => $row['en_description'],
            "ar_description" => $row['ar_description']
        );

        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}
// print_r (listProductsById(3));

function changeProductStatus($id, $status)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $sql = "call change_product_status('$id','$status')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function insertInvoice($invoice_no, $issue_date, $period, $invoice_date, $credit_days, $product_id, $product_qty, $units, $cost, $vat_id, $supplier_tax, $en_description, $ar_description, $uom, $price, $vat_percent, $vat_amt, $total, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_invoice('$invoice_no','$issue_date','$period','$invoice_date','$credit_days','$product_id','$product_qty','$units','$cost','$vat_id','$supplier_tax','$en_description','$ar_description','$uom','$price','$vat_percent','$vat_amt','$total','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}
// echo json_encode(insertInvoice(1,'21-02-2020','21-02-2020','21-02-2020',5,3,5,2,'210','df3xw','34','sdfg','sdff','sdf','ds',4,'4','4343','21-02-2020'));

function listInvoice($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_invoice('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "cId" => $row['cId'],
            "cName" => $row['cName'],
            "coName" => $row['coName'],
            "issue_date" => $row['issue_date'],
            "po_number" => $row['po_number'],
            "due_date" => $row['due_date'],
            "credit_days" => $row['credit_days'],
            "exclude_vat" => $row['exclude_vat'],
            "total" => $row['total'],
            "status" => $row['i_status'],
            "received_amount" => $row['received_amount'],
            "Uen_firstname" => $row['Uen_firstname'],
            "en_lastname" => $row['en_lastname']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listInvoiceById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_invoice_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            //"cId" => $row['cId'],
            "issue_date" => $row['issue_date'],
            "total" => $row['total'],
            // "invoice_date" => $row['invoice_date'],
            // "credit_days" => $row['credit_days'],
            // "product_id" => $row['product_id'],
            // "product_qty" => $row['product_qty'],
            // "units" => $row['units'],
            // "cost" => $row['cost'],
            // "vat_id" => $row['vat_id'],
            // "supplier_tax" => $row['supplier_tax'],
            "received_amount" => $row['received_amount']
        );
        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

// echo json_encode(listInvoiceById(15));

function insertInvoiceReceipt($invoice_id, $invoice_date, $invoice_total, $payment, $received_amount, $receipt_date, $en_description, $ar_description, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_invoice_receipt('$invoice_id','$invoice_date','$invoice_total','$payment','$received_amount','$receipt_date','$en_description','$ar_description','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}


function insertBill($vendor_id, $bill_date, $bill_no, $credit_days, $product_id, $product_qty, $units, $cost, $en_description, $ar_description, $price, $total, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_bill('$vendor_id','$bill_date','$bill_no','$credit_days','$product_id','$product_qty','$units','$cost','$en_description','$ar_description','$price','$total','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function listBill()
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_bill()";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "vendor_id" => $row['vendor_id'],
            "bill_date" => $row['bill_date'],
            "bill_no" => $row['bill_no'],
            "credit_days" => $row['credit_days'],
            "product_id" => $row['product_id'],
            "product_qty" => $row['product_qty'],
            "units" => $row['units'],
            "cost" => $row['cost'],
            "en_description" => $row['en_description'],
            "ar_description" => $row['ar_description'],
            "price" => $row['price'],
            "total" => $row['total']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listBillById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_bill_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "vendor_id" => $row['vendor_id'],
            "bill_date" => $row['bill_date'],
            "bill_no" => $row['bill_no'],
            "credit_days" => $row['credit_days'],
            "product_id" => $row['product_id'],
            "product_qty" => $row['product_qty'],
            "units" => $row['units'],
            "cost" => $row['cost'],
            "en_description" => $row['en_description'],
            "ar_description" => $row['ar_description'],
            "price" => $row['price'],
            "total" => $row['total']
        );
        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

function insertBillReceipt($bill_id, $bill_date, $bill_total, $payment, $received_amount, $receipt_date, $en_description, $ar_description, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_bill_receipt('$bill_id','$bill_date','$bill_total','$payment','$received_amount','$receipt_date','$en_description','$ar_description','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function getBillDetailsById($bill_id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call get_bill_details_by_id('$bill_id')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "bill_Id" => $row['bill_Id'],
            "en_vname" => $row['en_vname'],
            "bill_date" => $row['bill_date'],
            "total" => $row['total'],
            "received_amount" => $row['received_amount']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function getReceiptDetails($bill_id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call get_receipt_details('$bill_id')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "bill_date" => $row['bill_date'],
            "bill_total" => $row['bill_total'],
            "payment" => $row['payment'],
            "en_vname" => $row['en_vname'],
            "en_address" => $row['en_address'],
            "en_description" => $row['en_description'],
            "received_amount" => $row['received_amount'],
            "vat_id" => $row['vat_id'],
            "en_name" => $row['en_name'],
            "cdn_address" => $row['cdn_address'],
            "en_phone_no" => $row['en_phone_no'],
            "email" => $row['email'],
            "ar_vname" => $row['ar_vname'],
            "ar_address" => $row['ar_address'],
            "ar_description" => $row['ar_description'],
            "receipt_date" => $row['receipt_date']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}
// print_r(getReceiptDetails(27));

function list_company_details()
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_company_details()";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_name" => $row['en_name'],
            "ar_name" => $row['ar_name'],
            "en_phone_no" => $row['en_phone_no'],
            "ar_phone_no" => $row['ar_phone_no'],
            "en_address" => $row['en_address'],
            "ar_address" => $row['ar_address'],
            "en_bank_details" => $row['en_bank_details'],
            "ar_bank_details" => $row['ar_bank_details'],
            "en_vat" => $row['en_vat'],
            "ar_vat" => $row['ar_vat'],
            "en_tax" => $row['en_tax'],
            "ar_tax" => $row['ar_tax'],
            "email" => $row['email']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function change_company_details_status($id, $status)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $sql = "call change_company_details_status('$id','$status')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

// `in_en_name` TEXT, `in_ar_name` TEXT,  `in_en_phone_no` TEXT,
// `in_ar_phone_no` TEXT,`in_en_address` TEXT,`in_ar_address` TEXT, `in_email` TEXT, `in_en_bank_details` TEXT,`in_ar_bank_details` TEXT,
// `in_en_vat` TEXT,`in_ar_vat` TEXT,`in_en_tax` TEXT,`in_ar_tax` TEXT,`in_created_by` INT, `in_created_on` TEXT
function insert_company_details($en_name, $ar_name, $en_phone_no, $ar_phone_no, $en_address, $ar_address, $email, $en_bank_details, $en_vat, $en_tax, $created_by, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_company_details('$en_name','$ar_name','$en_phone_no','$ar_phone_no','$en_address','$ar_address','$email','$en_bank_details','$en_vat','$en_tax','$created_by','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}
function updateCompanyDetails($id, $en_name, $ar_name, $en_phone_no, $ar_phone_no, $en_address, $ar_address, $email, $en_bank_details, $en_vat)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call update_company_details('$id','$en_name','$ar_name','$en_phone_no','$ar_phone_no','$en_address','$ar_address','$email','$en_bank_details','$en_vat')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}
// echo updateCompanyDetails(7,'sasi','sasi','111','111','tvt','tvt','liai.sasisachin@gmail.com','tvt','tvt','13','13','68','68');
function listCompanyById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_company_details_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_name" => $row['en_name'],
            "ar_name" => $row['ar_name'],
            "en_phone_no" => $row['en_phone_no'],
            "ar_phone_no" => $row['ar_phone_no'],
            "en_address" => $row['en_address'],
            "ar_address" => $row['ar_address'],
            "en_bank_details" => $row['en_bank_details'],
            "ar_bank_details" => $row['ar_bank_details'],
            "en_vat" => $row['en_vat'],
            "ar_vat" => $row['ar_vat'],
            "en_tax" => $row['en_tax'],
            "ar_tax" => $row['ar_tax'],
            "email" => $row['email']
        );


        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function insertEstimation($client_id, $estimation_date, $estimation_no, $credit_days, $product_id, $product_qty, $units, $cost, $en_description, $ar_description, $vat_id, $supplier_tax, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_estimation('$client_id','$estimation_date','$estimation_no','$credit_days','$product_id','$product_qty','$units','$cost','$en_description','$ar_description','$vat_id','$supplier_tax','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function listEstimation()
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_estimation()";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "estimation_id" => $row['estimation_id'],
            "estimation_date" => $row['estimation_date'],
            "expires_on" => $row['expires_on'],
            "estimation_total" => $row['estimation_total'],
            "qty" => $row['qty'],
            "vat" => $row['vat'],
            "vat_amount" => $row['vat_amount']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listEstimationById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_estimation_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "estimation_id" => $row['estimation_id'],
            "estimation_date" => $row['estimation_date'],
            "expires_on" => $row['expires_on'],
            "estimation_total" => $row['estimation_total'],
            "qty" => $row['qty'],
            "vat" => $row['vat'],
            "vat_amount" => $row['vat_amount']
        );
        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

function insertEstimationReceipt($estimation_id, $estimation_date, $expires_on, $estimation_total, $qty, $vat, $vat_amount, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_estimation_receipt('$estimation_id','$estimation_date','$expires_on','$estimation_total','$qty','$vat','$vat_amount','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function invoiceFormDetailsById($id)
{ //new
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call invoice_form_details_by_Id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "invoiceId" => $row['invoiceId'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "ar_firstname" => $row['ar_firstname'],
            "ar_lastname" => $row['ar_lastname'],
            "client_name" => $row['client_name'],
            "ar_client_name" => $row['ar_client_name'],
            "en_phone_no" => $row['en_phone_no'],
            "en_landline" => $row['en_landline'],
            "en_address" => $row['en_address'],
            "ar_phone_no" => $row['ar_phone_no'],
            "ar_landline" => $row['ar_landline'],
            "ar_address" => $row['ar_address'],
            "email" => $row['email'],
            "client_id" => $row['client_id'],
            "issue_date" => $row['issue_date'],
            "po_number" => $row['po_number'],
            "credit_days" => $row['credit_days'],
            "i_status" => $row['i_status'],
            "discount" => $row['discount'],
            "received_amount" => $row['received_amount'],
            "created_by" => $row['created_by'],
            "created_on" => $row['created_on'],
            "compEnAddress" => $row['compEnAddress'],
            "compArAddress" => $row['compArAddress'],
            "en_bank_details" => $row['en_bank_details'],
            "ar_tax" => $row['ar_tax'],
            "en_name" => $row['en_name'],
            "ar_name" => $row['ar_name'],
            "total" => $row['total'],
            "vat_amount" => $row['vat_amount'],
            "en_tax" => $row['en_tax'],
            "due_date" => $row['due_date'],
            "exclude_vat" => $row['exclude_vat'],
            "tax_no" => $row['tax_no'],
            "en_com_name" => $row['en_com_name'],
            "ar_com_name" => $row['ar_com_name'],
            "en_vat" => $row['en_vat'],
            "notes" => $row['notes']
        );
        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

function listInvoiceDetailsById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_invoice_details_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "en_pname" => $row['en_pname'],
            "description" => $row['description'],
            "ar_description" => $row['ar_description'],
            "qty" => $row['qty'],
            "uom" => $row['uom'],
            "price" => $row['price'],
            "vat" => $row['vat'],
            "vat_amount" => $row['vat_amount'],
            "row_total" => $row['row_total']
        );
        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

function getInvoiceReceiptDetails($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call get_invoice_receipt_details('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "invoice_id" => $row['invoice_id'],
            "invoice_date" => $row['invoice_date'],
            "invoice_total" => $row['invoice_total'],
            "payment" => $row['payment'],
            "receipt_date" => $row['receipt_date'],
            "en_description" => $row['en_description'],
            "ar_description" => $row['ar_description'],
            "received_amount" => $row['received_amount'],
            "en_name" => $row['en_name'],
            "en_address" => $row['en_address'],
            "email" => $row['email'],
            "en_bank_details" => $row['en_bank_details'],
            "en_vat" => $row['en_vat'],
            "en_tax" => $row['en_tax'],
            "en_phone_no" => $row['en_phone_no'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "ar_firstname" => $row['ar_firstname'],
            "ar_lastname" => $row['ar_lastname'],
            "cen_phone_no" => $row['cen_phone_no'],
            "cen_address" => $row['cen_address'],
            "car_phone_no" => $row['car_phone_no'],
            "car_address" => $row['car_address'],
            "en_com_name" => $row['en_com_name'],
            "ar_com_name" => $row['ar_com_name']
        );
        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}


function getCurrency(float $number)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $decimal_part = $decimal;
    $hundred = null;
    $hundreds = null;
    $digits_length = strlen($no);
    $decimal_length = strlen($decimal);
    $i = 0;
    $str = array();
    $str2 = array();
    $words = array(
        0 => '',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'forty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety'
    );
    $digits = array('', 'hundred', 'thousand', 'million', 'billion');

    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? '' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
        } else $str[] = null;
    }

    $d = 0;
    while ($d < $decimal_length) {
        $divider = ($d == 2) ? 10 : 100;
        $decimal_number = floor($decimal % $divider);
        $decimal = floor($decimal / $divider);
        $d += $divider == 10 ? 1 : 2;
        if ($decimal_number) {
            $plurals = (($counter = count($str2)) && $decimal_number > 9) ? '' : null;
            $hundreds = ($counter == 1 && $str2[0]) ? ' and ' : null;
            @$str2[] = ($decimal_number < 21) ? $words[$decimal_number] . ' ' . $digits[$decimal_number] . $plural . ' ' . $hundred : $words[floor($decimal_number / 10) * 10] . ' ' . $words[$decimal_number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
        } else $str2[] = null;
    }

    $Rupees = implode('', array_reverse($str));
    $paise = implode('', array_reverse($str2));
    $paise = ($decimal_part > 0) ? $paise . ' Halala' : '';
    return ($Rupees ? $Rupees . 'Riyals ' : '') . $paise;
}

//echo json_encode(getCurrency(476330.40));

function listInvoiceDateReport($startDate, $endDate)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_invoice_report_date_based('$startDate','$endDate')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "invoiceId" => $row['invoiceId'],
            "clientName" => $row['clientName'],
            "companyName" => $row['companyName'],
            "issue_date" => $row['issue_date'],
            "po_number" => $row['po_number'],
            "due_date" => $row['due_date'],
            "total" => $row['total'],
            "exclude_vat" => $row['exclude_vat'],
            "received_amount" => $row['received_amount'],
            "i_status" => $row['i_status']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}
function invoiceDueReport($ulevel)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call invoice_due_report('$ulevel')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "cName" => $row['cName'],
            "toTal" => $row['toTal'],
            "i_status" => $row['i_status'],
            "rAmnt" => $row['rAmnt'],
            "client_id" => $row['client_id']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}




function listEstimationDateReport($startDate, $endDate)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_estimation_report_date_based('$startDate','$endDate')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "estimationId" => $row['estimationId'],
            "clientName" => $row['clientName'],
            "companyName" => $row['companyName'],
            "estimation_date" => $row['estimation_date'],
            "po_number" => $row['po_number'],
            "credit_days" => $row['credit_days'],
            "expiry_date" => $row['expiry_date'],
            "payment_terms" => $row['payment_terms'],
            "exclude_vat" => $row['exclude_vat'],
            "vat_amount" => $row['vat_amount'],
            "total" => $row['total'],
            "discount" => $row['discount'],
            "discount_vat" => $row['discount_vat'],
            "discount_total" => $row['discount_total']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listVendorBillDateReport($startDate, $endDate)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_vendor_bill_date_based('$startDate','$endDate')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "billId" => $row['billId'],
            "vendorName" => $row['vendorName'],
            "vendor_id" => $row['vendor_id'],
            "bill_date" => $row['bill_date'],
            "po_number" => $row['po_number'],
            "credit_days" => $row['credit_days'],
            "due_date" => $row['due_date'],
            "exclude_vat" => $row['exclude_vat'],
            "vat_amount" => $row['vat_amount'],
            "total" => $row['total'],
            "received_amount" => $row['received_amount'],
            "payment_terms" => $row['payment_terms'],
            "i_status" => $row['i_status']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}
function listVatDateReport($startDate, $endDate)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_vat_report_date_based('$startDate','$endDate')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "vat" => $row['vat'],
            "issue_date" => $row['issue_date']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}
function listVatReceiptDateReport($startDate, $endDate)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_vat_receipt_report_date_based('$startDate','$endDate')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "IID" => $row['IID'],
            "vat" => $row['vat'],
            "receipt_date" => $row['receipt_date']
        );
        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}
function listBillVatDateReport($startDate, $endDate)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_bill_vat_report_date_based('$startDate','$endDate')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "IID" => $row['IID'],
            "vat" => $row['vat'],
            "bill_date" => $row['bill_date']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listBillVatReceiptDateReport($startDate, $endDate)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_bill_vat_receipt_report_date_based('$startDate','$endDate')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "IID" => $row['IID'],
            "vat" => $row['vat'],
            "receipt_date" => $row['receipt_date']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function estimationBasedDetailsReport($ulevel)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call estimation_based_details_report('$ulevel')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "estimationId" => $row['estimationId'],
            "invoice_ID" => $row['invoice_ID'],
            "issue_date" => $row['issue_date'],
            "po_number" => $row['po_number'],
            "credit_days" => $row['credit_days'],
            "due_date" => $row['due_date'],
            "exclude_vat" => $row['exclude_vat'],
            "vat_amount" => $row['vat_amount'],
            "total" => $row['total']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function insertTaskDetails($assigned_to, $task_title, $task_description, $start_date, $end_date, $document_name, $created_by, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $sql = "call insert_task_details('$assigned_to','$task_title','$task_description','$start_date','$end_date','$document_name','$created_by','$created_on')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return ($result);
}

function pendingTaskDetails($userLevel, $userId)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call pending_task_details('$userLevel','$userId')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "uuid" => $row['uuid'],
            "assigned_to" => $row['assigned_to'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "start_date" => $row['start_date'],
            "end_date" => $row['end_date'],
            "task_title" => $row['task_title'],
            "task_description" => $row['task_description'],
            "document_name" => $row['document_name'],
            "status" => $row['status'],
            "nstatus" => $row['nstatus']
        );
        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

function completedTaskDetails($userLevel, $userId)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call completed_task_details('$userLevel','$userId')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "uuid" => $row['uuid'],
            "assigned_to" => $row['assigned_to'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "start_date" => $row['start_date'],
            "end_date" => $row['end_date'],
            "task_title" => $row['task_title'],
            "task_description" => $row['task_description'],
            "document_name" => $row['document_name'],
            "status" => $row['status']
        );
        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

function changePendingStatus($id, $status)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $sql = "call change_pending_status('$id','$status')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function changeTaskAcceptStatus($id, $nstatus)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $sql = "call change_task_accept_status('$id','$nstatus')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function listAssignTaskById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_assign_task_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "en_firstname" => $row['en_firstname'],
            "en_lastname" => $row['en_lastname'],
            "assigned_to" => $row['assigned_to'],
            "task_title" => $row['task_title'],
            "task_description" => $row['task_description'],
            "start_date" => $row['start_date'],
            "end_date" => $row['end_date']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function updateAssingTask($id, $assigned_to, $task_title, $task_description, $start_date, $end_date, $updated_on, $status)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call update_assign_task('$id','$assigned_to','$task_title','$task_description','$start_date','$end_date','$updated_on','$status')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function listInvoiceReceiptDateReport($startDate, $endDate)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_invoice_receipt_report_date_based('$startDate','$endDate')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "invoice_id" => $row['invoice_id'],
            "id" => $row['id'],
            "receipt_date" => $row['receipt_date'],
            "invoice_total" => $row['invoice_total'],
            "en_description" => $row['en_description'],
            "ar_description" => $row['ar_description']
        );
        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listContract()
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_contract()";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "project_name" => $row['project_name'],
            "ar_project_name" => $row['ar_project_name'],
            "domain_name" => $row['domain_name'],
            "ar_domain_name" => $row['ar_domain_name'],
            "service_provider" => $row['service_provider'],
            "ar_service_provider" => $row['ar_service_provider'],
            "project_details" => $row['project_details'],
            "ar_project_details" => $row['ar_project_details'],
            "fees_details" => $row['fees_details'],
            "ar_fees_details" => $row['ar_fees_details'],
            "project_deliverable" => $row['project_deliverable'],
            "ar_project_deliverable" => $row['ar_project_deliverable'],
            "issue_date" => $row['issue_date'],
            "project_timeline" => $row['project_timeline'],
            "ar_project_timeline" => $row['ar_project_timeline'],
            "star_date" => $row['star_date']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listContractById($id)
{ //new
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_contract_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "project_name" => $row['project_name'],
            "ar_project_name" => $row['ar_project_name'],
            "domain_name" => $row['domain_name'],
            "ar_domain_name" => $row['ar_domain_name'],
            "service_provider" => $row['service_provider'],
            "ar_service_provider" => $row['ar_service_provider'],
            "project_details" => $row['project_details'],
            "ar_project_details" => $row['ar_project_details'],
            "fees_details" => $row['fees_details'],
            "ar_fees_details" => $row['ar_fees_details'],
            "project_deliverable" => $row['project_deliverable'],
            "ar_project_deliverable" => $row['ar_project_deliverable'],
            "issue_date" => $row['issue_date'],
            "project_timeline" => $row['project_timeline'],
            "ar_project_timeline" => $row['ar_project_timeline'],
            "contract_id" => $row['contract_id'],
            "star_date" => $row['star_date']
        );

        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

function listContractDetailsById($id)
{ //new
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_contract_details_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "contract_id" => $row['contract_id'],
            "en_timeline_desc" => $row['en_timeline_desc'],
            "ar_timeline_desc" => $row['ar_timeline_desc'],
            "days" => $row['days']
        );

        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

function insertContractChanges($project_name, $contract_changes, $ar_project_name, $ar_contract_changes, $created_by, $created_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call insert_contract_changes('$project_name','$contract_changes','$ar_project_name','$ar_contract_changes','$created_by','$created_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}

function listContractChanges()
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_contract_changes()";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "project_name" => $row['project_name'],
            "contract_changes" => $row['contract_changes'],
            "ar_project_name" => $row['ar_project_name'],
            "ar_contract_changes" => $row['ar_contract_changes']
        );

        $outputarray[] = $obj;
    }

    mysqli_close($conn);
    return ($outputarray);
}

function listContractChangesById($id)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';
    $outputarray = array();

    $query = "call list_contract_changes_by_id('$id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $obj = array(
            "id" => $row['id'],
            "project_name" => $row['project_name'],
            "contract_changes" => $row['contract_changes'],
            "ar_project_name" => $row['ar_project_name'],
            "ar_contract_changes" => $row['ar_contract_changes']
        );

        $outputarray[] = $obj;
    }
    mysqli_close($conn);
    return ($outputarray);
}

function updateContractChanges($id, $project_name, $contract_changes, $ar_project_name, $ar_contract_changes, $updated_on)
{
    include '/opt/lampp/htdocs/rentacar/helpers/config.php';

    $sql = "call update_contract_changes('$id','$project_name','$contract_changes','$ar_project_name','$ar_contract_changes','$updated_on')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    return ($result);
}
