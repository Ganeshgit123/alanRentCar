<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">

<title>Contract</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
<link rel="stylesheet" href="assets/styles/table.css">
<link rel="stylesheet" type="text/css" href="assets/styles/contract.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

<?php
 
include_once('process/dao.php');
$contract_id = $_GET["contract_id"];
// $invoice_id =17;
$val = listContractById($contract_id);
foreach ($val as $cval) {
?>
<table>

    <thead>
      <tr>
        <td>
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="page">
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <h2>FULL AGREEMENT</h2>
      <p><strong>Summary:</strong> This is a comprehensive contract for building a <?php echo $cval['project_name'];?>. This agreement will be setting out detailed requirements and parameters for development, design and delivery milestone. Along with the timeline and the costing.</p>
</div>
<div class="col-6 letter-title1">
<h2 class="arabic" style="text-align: center;">الإتفاقية الكاملة</h2>
      <p class="arabic"><strong>ملخص:</strong>هذه إتفاقية ت<?php echo $cval['ar_project_name'];?>حيث تحدد المتطلبات التفصيلية ومعايير التطوير والتصميم ومراحل التسليم والكلفة .</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <h2 class="text-left"><?php echo $cval['project_name'];?></h2>
</div>
<div class="col-6 letter-title1">
<h2 class="arabic"><?php echo $cval['ar_project_name'];?></h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p>A. The Company has registered and owns the
rights to the website under domain name <?php echo $cval['domain_name'];?> (the “Domain”).</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">أ- قامت الشركة بتسجيل التطبيق تحت إسم <?php echo $cval['ar_domain_name'];?>
وهي تمتلك جميع الحقوق الخاصة به (                             ).</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p>B.  The Company requires the design and development of the App.</p>
</div>
<div class="col-6 letter-title1">
 <p class="arabic">ب- تطلب الشركة تصميم وتطوير التطبيق للأجهزة الذكية .</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <p>C. The Service Provider has agreed to design and develop the Application for the Company, and provide Services to the Company, subject to the terms and conditions of this Agreement and Project Schedules.</p>
</div>
<div class="col-6 letter-title1">
 <p class="arabic">ج- وافق مزود الخدمة على تصميم وتطوير التطبيق للأجهزة الذكية للشركة وتوريد الخدمات للشركة بناءً على شروط وأحكام هذه الإتفاقية وجداول المشروع. </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <p>D. The Service Provider will <?php echo $cval['service_provider'];?> for the Company, and provide further Services to the Company, subject to the terms of this Agreement and in accordance with the further Schedules to be agreed between the Parties and attached to this Agreement from time to time.</p>
</div>
<div class="col-6 letter-title1">
 <p class="arabic">د- مزود الخدمة س<?php echo $cval['ar_service_provider'];?>وف يصمم ويطور التطبيق للأجهزة الذكية كإضافة للشركة ويقدم خدمات لاحقة للشركة بناء ً على أحكام هذه الإتفاقية ووفقا ً للجداول اللاحقة التي سوف يوافق عليها الأطراف وتلحق بهذه الإتفاقية من وقت لآخر .</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <h2 class="text-left">AGREED DOCUMENT</h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">تم الإتفاق على </h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p>1. Definitions and Interpretation </p>
</div>
<div class="col-6 letter-title1">
   <p class="arabic">1- التعريف والتفسير ،</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <p>1.1  In this Agreement </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">1.1 – في هذه الإتفاقية </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>a. “<strong>Completion Date</strong>”, in relation to a project, means to the completion date specified in the schedule </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">أ- "<strong>تاريخ الإنتهاء</strong>" ، فيما يتعلق بالمشروع يعني تاريخ الإنتهاء المحدد في الجدول من هذه الإتفاقية</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>b. “<strong>Content</strong>” In relation to a project, means any content, information and materials to be supplied by the company to service provider for inclusion on the relevant deliverable for the project before completion date. </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">ب- "<strong> المحتوى</strong>" فيما تعلق بالمشروع ، يعني أي محتوى ، معلومة أو مواد يجب تقديمها لمزود الخدمة ليقوم بتضمينها في الخدمة الموردة التي يقدمها للمشروع قبل تاريخ الإنتهاء </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>c.  “<strong>Defect</strong>” means any failure of any Deliverable to perform in accordance with any requirement in the development specifications and Functionalities for the project. </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">ج- "<strong> العطل</strong>" يعني أي فشل في أي خدمة موردة في العمل مع أي من المتطلبات في تطوير الميزات والوظائف العملانية في المشروع.</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>d. “<strong>GO Live Date</strong>” means the date the Mobile Application is launched on the internet for public use which shall be after the date all of the following have occurred:<br> 1. Mobile Application has been approved by the company in writing and<br> 2. The Mobile Application meets the development specification. </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">د- <strong>" إطلاق التاريخ المباشر</strong>" تعني تاريخ إطلاق التطبيق للأجهزة الذكية على شبكة الإنترنت لإستخدام العموم والذي يفترض أن يكون بعد تاريخ حصول التالي <br>(1) موافق الشركة الخطية على التطبيق للأجهزة الذكية، <br>(2) تطابق التطبيق مع الميزات المطورة.   </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>e. “<strong>Links</strong>” means a hypertext link connecting the deliverables to other mobile application or other vendors </p>
</div>
<div class="col-6 letter-title1">
 <p class="arabic">هـ - "<strong> الرابط</strong>" يعني الرابط الذي يؤمن الإتصال بين الخدمة الموردة والمواقع الإلكترونية الأخرى. </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>f. “<srong>Source Files</srong>” means computer files (including but not limited to files with the extensions. PSD,. FLA,. PNG,. AI or any files used for development) in their complete and original format, which have been used to create elements of the Deliverables (including but not limited to images, animations, Videos, Navigation) and are required for such elements to be manipulated, changed and output. </p>
</div>
<div class="col-6 letter-title1">
 <p class="arabic">و- "<strong>ملفات المصدر</strong>" تعني ملفات الكمبيوتر ( تتضمن ولكن ليس على سبيل الحصر الملفات التي تنتهي بـ (بي. اس . دي) (إف . إل .أي) ( بي . إن .جي) (أي. آي) في صيغتهم الكاملة والأصلية والتي تستخدم لتشكيل عناصر الخدمة الموردة ( تتضمن ولكن ليس على سبيل الحصر الصور، التفاعل الحركي، الفيديو، البحث على الإنترنت) والتي تطلب لجعل هذه العناصر توجه وتتغير وتظهر.</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>g. “<strong>Test-Run</strong>” means partial or Temporary version of the application developed by Service provider for review of the company. </p>
</div>
<div class="col-6 letter-title1">
 <p class="arabic">ز- "<strong>الموقع التجريبي</strong>"  تعني النسخة الجزئية أو المؤقتة للتطبيق الذكي  من قبل مزود الخدمة للمراجعة من قبل الشركة.</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <h2 class="text-left">2.  Services</h2>
</div>
<div class="col-6 letter-title1">
 <h2 class="arabic">2- الخدمات</h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>2.1 The Service Provider agrees to develop the company Mobile Application under the domain Name and to deliver the services provided in Schedule 1. According to the development specifications and functionalities as provided in Schedule 2 of this agreement. </p>
</div>
<div class="col-6 letter-title1">
 <p class="arabic">2.1 – وافق مورد الخدمة على تطوير التطبيق الإلكتروني للشركة تحت إسم النطاق وعلى توصيل الخدمات الواردة في الجدول (1) بناء على تطوير الميزات والوظائف العملانية كما وردت في الجدول (2) من هذه الإتفاقية المرفقة.</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <h2 class="text-left">2.2 In relation to the Project: </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">2.2- فيما يتعلق بالمشروع:</h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>Service provider must, from the commencement date, perform the service to develop the deliverables in accordance with the terms and conditions of this agreement and the highest standard customary in the relevant industry. </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">يجب على مورد الخدمة منذ تاريخ البدء ، تقديم الخدمات لتطوير الخدمات الموردة على أحكام وشروط هذه الإتفاقية وبناء على أعلى المعايير المتعارف عليها في هذه الصناعة.</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>2.3 Subject to the requirement in clause 5, nothing in this clause 1 affects service provider’s right to exercise its own judgement and utilize its creative skills as it considers most appropriate in order to develop the deliverables in accordance with the development specification. Service provider may exercise its total creative discretion in developing the deliverables to the extent that exercise of such discretion is not inconsistent with the development.</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">2.3- بناء على متطلبات البند (5) لا يوجد مانع في البند (2) يؤثر على حق مورد الخدمة في ممارسة حكمه الخاص وإستخدام مهاراته الخلاقة والتي تعتبر الأكفأ في تطوير الخدمات الموردة بناء على ميزات التطوير ، يمكن لمورد الخدمة ان يمارس خياراته الخلاقة الكاملة في تطوير الخدمات الموردة ومحتواها على ان تكون ممارسة هكذا خيارات ليست، غير منسجمة مع ميزات التطوير في هذه الإتفاقية. </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>2.4 Training Prior to the Go live Date, the Service provider will provide up to five days of Verbal training (via Telephone, One-on-one or in person at the company’s discretion) for company’s staff.</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">2.4-  "التدريب" قبل تاريخ الإطلاق المباشر ، سوف يقدم مورد الخدمة (5) خمسة أيام من التدريب النظري ( عبر الهاتف، محاضرة، شخص لشخص أو لشخص محدد بناء على قرارات الشركة) لموظفي الشركة.</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <h2 class="text-left">3. Development Stage</h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">3- مرحلة التطوير.</h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>In relation to the project: </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">فيما يتعلق بالمشروع</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>3.1  Service Provider must develop the deliverables in accordance with the development specifications. The time line and this Scheduled Date / Month of Going Live.</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">3.1- يجب على مزود الخدمة أن يطور الخدمة الموردة بناء على ميزات التطوير ، الجدول الزمني وهذه الإتفاقية.</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>3.2  Service provider must complete the development of the deliverables and provide each complete deliverable (including all Source files) to the company on Hard drive / USB or via Secure FTP download (as specified by the company) by the completion date. </p>
</div>
<div class="col-6 letter-title1">
   <p class="arabic">3.2-يجب على مزود الخدمة إتمام تطوير الخدمة الموردة وتقديم كل خدمة موردة مكتملة ( بما في ذلك ملفات المصدر) إلى الشركة على قرص ممغنط / ذاكرة متنقلة أو على (إف . تي .بي) كما هو محدد من قبل الشركة ( في تاريخ الإنتهاء).</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <h2 class="text-left">4. Warranties of the parties </h2>
</div>
<div class="col-6 letter-title1">
   <h2 class="arabic">4- "ضمانات الأطراف"</h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>4.1 Service provider warrants to the company that: </p>
</div>
<div class="col-6 letter-title1">
   <p class="arabic">4.1- يضمن مورد الخدمة للشركة أنه:</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
      <p>1. It will comply with its obligations under this Agreement.</p>
</div>
<div class="col-6 letter-title1">
   <p class="arabic">1- سيلتزم بموجباته لهذه الإتفاقية.</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
      <p>2. It has the necessary skill and resource to perform its obligations under this agreement; </p>
</div>
<div class="col-6 letter-title1">
   <p class="arabic">2- يملك المؤهلات الضرورية والمصادر لإتمام موجباته وفقا لهذ الإتفاقية. </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
      <p>3. The service supplied to the company will be provided in a highly professional manner and to a highly professional standard.</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">3- الخدمات المقدمة للشركة ستقدم وفقاً لأعلى المعايير المهنية ولأعلى معايير الجودة.</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
      <p>4.2 The company warrants to service provider that: </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">4.2 – تضمن الشركة لمورد الخدمة بأنها:</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
       <p>1. It will perform all task assigned to the company as set forth in this agreement and to provide all assistance and cooperation to provider in order to complete timely and efficiently the Mobile Application. Service provider shall not be deemed in breach of this agreement or any milestone set forth in the schedules in the event service provider’s failure to meet its responsibilities and time schedules is caused by company’s failure to meet its responsibilities and time schedules set forth in this Agreement. </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">1- ستقوم بجميع المسائل المتعلقة بها كما ورد في هذه الإتفاقية وأن تقدم كل المساعدة والتعاون المطلوب لمورد الخدمة لإتمام التطبيق للأجهزة الذكية في الوقت المحدد وبالفعالية المطلوبة ، لا يعتبر مورد الخدمة منتهكاً لأحكام هذه الإتفاقية أو للجدول الزمني المحدد في جداول الإتفاقية في حال كان فشل مورد الخدمة بالإلتزام بمسئولياته أو بالجدول الزمني ناتجاً عن فشل الشركة بالإلتزام بمسئولياتها ( أو تأخرت بها) أو بالجدول الزمني المذكور في هذه الإتفاقية. </p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <h2 class="text-left">5."<strong>Requirement of Deliverables</strong>"</h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">5- "<strong>متطلبات الخدمات الموردة"</strong></h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>5.1 Service provider must ensure that the deliverables: </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">5.1 – يجب على أن يضمن مورد الخدمة ان الخدمات الموردة:</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>1. Comply with all styles guides and promotional standards and other similar materials provided by the company to service provider</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">1- متطابقة مع جميع إرشادات الأسلوب والمعايير الترويجية والمواد المشابهة الأخرى المقدمة من الشركة لمورد الخدمة </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>2. Do not contain any materials that are obscene, offensive, upsetting, defamatory, personally offensive or, in any way unsuitable for people under the age of eighteen (18) years;</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">2- لا تتضمن أي من مواد تكون مسيئة ، عدائية ، جارحة ، بذيئة، تتضمن عداء شخصي أو بأي طريقة من الطرق غير مناسبة للأشخاص الذين تقل أعمارهم عن ثمانية عشر عاما (18).</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>3. Do not comprise material which is illegal, associated with illegal or threatening activities, fraudulent or defamatory in nature; </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">3- أن لا تتضمن مواد غير قانونية أو محتوية على نشاطات خطرة أو غير قانونية، مخادعة أو خادشة للحياء بطبيعتها.</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>5.2 Service provider must ensure that the site will not contain any links to external web site without the written consent of the company. </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">5.2- يجب على مورد الخدمة أن يضمن أن التطبيق للأجهزة الذكية سوف لا يتضمن أي روابط لمواقع إلكترونية خارجية من دون الموافقة المسبقة والخطية للشركة.</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <h2 class="text-left">6. Warranty Period </strong></h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">6- " مدة الضمان"</h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>In relation to each project: </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">بما يتعلق في كل مشروع </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>1. Service provider must, at its cost and in its sole discretion: </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">1. يجب على مورد الخدمة، وعلى نفقته وعلى مسئوليته الخاصة: </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p style="padding-left: 2.3rem;">(a)  Remedy any defect in the deliverable; or </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic" style="padding-right: 2.3rem;">أ‌-  إصلاح أي خلل في الخدمة الموردة ، أو </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p style="padding-left: 2.3rem;">(b)  Resupply any service in respect of which there is any defect, </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic" style="padding-right: 2.3rem;">ب‌- إعادة توريد أي خدمات ما إن كانت متضمنة أي خلل </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>During the warranty period of the deliverable, provided that prompt written notice is given by the company to service provider of the defect in the services upon the company becoming aware of that defect; </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">وذلك خلال فترة ضمان الخدمة الموردة ، وحيث يجب أن تورد بناء على إشعار خطي مقدم من الشركة إلى مورد الخدمة بالخلل في الخدمات حين تنتبه الشركة لهذا الخلل.</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <h2 class="text-left">7. Fees </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">7. "الكلفة" </h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <p>The Total amount for the Mobile Application development with all the required application/ design to run the business would be SAR. And shall be paid by the company to the service provider in instalments according to the following schedule: </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">الكلفة الإجمالية لتصميم التطبيق للأجهزة الذكية مع كل التطويرات والتصميمات المطلوبة بقيمة (  ) فقط .</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <ol type='a'>  
<?php

$input = $cval['fees_details'];
// echo "string".$input;
      $fees = explode(',', $input);

  foreach($fees as $fcval){
    # code...
  
  ?>

    <?php echo '<li>'.$fcval.'</li>'; ?>
 
<?php } ?>
 </ol>
</div>
<div class="col-6 letter-title1">
  <ol style="list-style-type: arabic-indic;">  
<?php

$output = $cval['ar_fees_details'];
// echo "string".$output;
      $ar_fees = explode(',', $output);

  foreach($ar_fees as $arcval){
    # code...
  
  ?>

    <?php echo '<li class="arabic">'.$arcval.'</li>'; ?>
 
<?php } ?>
 </ol>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <h2 class="text-left">8. Confidentiality </h2>
</div>
<div class="col-6 letter-title1">
 <h2 class="arabic">8- "السرية" </h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <p>8.1 Each party agrees to regard and preserve as confidential all technical, financial and business information related to the business and activities of the other party, that may be obtained by such party from any source or may be developed as a result of this agreement. </p>
</div>
<div class="col-6 letter-title1">
 <p class="arabic">8.1  يوافق كل طرف على ( الطرف المتلقي ) أن يحافظ على سرية جميع المعلومات الفنية والمالية والتجارية والمرتبطة بأعمال ونشاطات الطرف الآخر ( الطرف الكاشف ) ، والتي يمكن الحصول عليها من قبل أي طرف من أي مصدر أو يمكن أن تكون قد تطورت نتيجة لهذه الإتفاقية ( المعلومات السرية للطرف الكاشف ).</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
     <h2 class="text-left">9. Ownership of Deliverables </h2>
</div>
<div class="col-6 letter-title1">
 <h2 class="arabic">9- "ملكية الخدمة الموردة" </h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <p>9.1 Service provider acknowledges that upon payment in full of the fees associated with the services, all ownership rights     ( including intellectual property rights ) in the deliverables        ( expect the third party materials) and any data output materials, manuals or other documentation relating to the development, use and operation of the deliverables, including the source files is and will be owned by the company.</p>
</div>
<div class="col-6 letter-title1">
 <p class="arabic">9.1- مورد الخدمة قد احيط علماً أنه فور التسديد الكامل لقيمة التكلفة مع الخدمات ، جميع حقوق الملكية ( بما فيها حقوق الملكية الفكرية ) للخدمة الموردة ( بإستثناء مواد الطرف الثالث ) وأي معلومات ، موارد الخروج كتيبات الدليل ، أو أية وثائق أخرى متعلقة في تطوير ، إستخدام وتشغيل الخدمات الموردة بما فيها ملفات المصدر ،( المواد ) تكون وستكون مملوكة المشاركة.</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <h2 class="text-left">10. Indemnity and Liability </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">10- "التعويض والمسئولية"</h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p>10.1 Service provider hereby <strong>indemnifies</strong> and must keep indemnified the company and its directors, officers, employees and agents against </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">10.1 – مورد الخدمة يعوض فيما يلي ويجب أن يستمر في تعويض الشركة مدرائها، موظفيها، مستخدميها، وعملائها (<strong> الطرف المعوض </strong>) عن :</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
 <p>a. All losses incurred by the indemnified party </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">أ- جميع الخسائر التي تكبدها الطرف المعوض ،.....</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
 <p>10.2 The company will use all reasonable endeavors to inform service provider of any matter which could lead to a claim, demand or liability, but failure to do so does not affect Service provider’s obligation and liabilities under this clause 10.</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">10.2- الشركة سوف تبذل أقصى جهدها لإعلام مورد الخدمة بأي مسألة قد تؤدي إلى إحتجاج، مطالبة أو مسئولية ولكن عدم القدرة على القيام بذلك لا يؤثر على موجبات ومسئوليات مورد الخدمة بموجب البند رقم (10).</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
 <h2 class="text-left">11. Termination </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">11- "إنهاء الإتفاقية"</h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
 <p>Termination of this agreement does not affect any claim either party may have against the other party as at the date of termination. </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">إن إنهاء هذه الإتفاقية لا يوثر على أي إعتراض مقدم من قبل أي من الطرفين ضد الطرف الآخر إلى تاريخ الإنتهاء.</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
 <h2 class="text-left">12. Force Majeure </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">12- " القوة القاهرة"</h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
 <p>Each Obligation of a party, other than an obligation to pay money, shall be suspended during the time and to the extent that the party is prevented from, or delayed in, complying with that obligation by Force Majeure.</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">كل إلتزام على أي طرف ، غير إلتزام دفع المال ، يجب أن يعلق خلال هذا وقت طالما أن الطرف منع من ، أو تأخر في إتمام إلتزامه بسبب القوة القاهرة.</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
 <h2 class="text-left">13. Governing Law and Dispute Resolution </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">13- "القانون المطبق وحل الخلافات" </h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
 <p>Disputes and disputes shall be resolved amicably between the parties. In the event that no amicable settlement is reached, the Saudi courts and the competent authorities in this regard shall be used to resolve and settle the disputes. </p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">تحل الخلافات والمنازعات بالطريقة الودية بين الأطراف وفي حال عدم الوصول إلى أي تسوية ودية فيتم اللجوء إلى القضاء السعودي بالمحاكم والجهات المختصة بهذا الشأن لحل الخلافات وتسويتها .</p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
 <h2 class="text-left">14. Project Details </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">14- "معلومات المشروع" </h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p><?php echo $cval['project_details'];?></p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic"><?php echo $cval['ar_project_details'];?></p>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <h2 class="text-left">15. Project Deliverable </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">15- "تسليم المشروع" </h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <ul>  
<?php

$input = $cval['project_deliverable'];
// echo "string".$input;
      $fees = explode(',', $input);

  foreach($fees as $fcval){
    # code...
  
  ?>

    <?php echo '<li>'.$fcval.'</li>'; ?>
 
<?php } ?>
 </ul>
</div>
<div class="col-6 letter-title1">
  <ul>  
<?php

$input = $cval['ar_project_deliverable'];
// echo "string".$input;
      $fees = explode(',', $input);

  foreach($fees as $fcval){
    # code...
  
  ?>

    <?php echo '<li class="arabic">'.$fcval.'</li>'; ?>
 
<?php } ?>
 </ul>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <h2 class="text-left">16. Project Timeline  </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">16-  "الجدول الزمني للمشروع"</h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <p>Total Time Estimated : <?php echo $cval['project_timeline'];?></p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">الوقت المتوقع لإنهاء المشروع : (<?php echo $cval['ar_project_timeline'];?>). </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
    <table class="table">
            <tbody>
              <?php

$contract_id = $_GET["contract_id"];
// $invoice_id =17; 
$wval = listContractDetailsById($contract_id);
foreach ($wval as $dval) {
?>
              <tr style="text-align: left;">
                <td><?php echo $dval['en_timeline_desc'];?></td>
                <td><?php echo $dval['days'];?> days</td>
              </tr>
         <?php } ?>
            </tbody>
          </table>
</div>
<div class="col-6 letter-title1">
  <table class="table">
            <tbody>
              <?php

$contract_id = $_GET["contract_id"];
// $invoice_id =17; 
$wval = listContractDetailsById($contract_id);
foreach ($wval as $dval) {
?>
              <tr>
                <td class="arabic"><?php echo $dval['days'];?> <span class="arabic">يوماً</span></td>
                <td class="arabic"><?php echo $dval['ar_timeline_desc'];?></td>
              
              </tr>
         <?php } ?>
            </tbody>
          </table>
</div>
</div>
</div>
<br>
<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <h2 class="text-left">17. Conclusion </h2>
</div>
<div class="col-6 letter-title1">
  <h2 class="arabic">17- الخاتمة </h2>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
   <p>17.1- Each of the two parties legally acknowledges their eligibility that the signatures appearing on this copy of the contract are the signatures approved by each of them with government agencies and official bodies.</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">17.1- يقر كل من الطرفان بأهليتهما شرعا بان التوقيعات الظاهرة على هذه النسخة من العقد هي التوقيعات المعتمدة لكل منهما لدى الهيئات الحكومية والجهات الرسمية. </p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p>17.2 - This contract was issued on <?php echo date('d/m/Y',strtotime($cval['issue_date']));?>in the city of Al-Khobar in two original copies, and each of them receives a copy to work according to it when necessary.</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">17.2 – تحرر هذا العقد بتاريخ <?php echo date('d/m/Y',strtotime($cval['issue_date']));?>  بمدينة ( الخبر ) من نسختين أصليتين وتسلم كل طرف منهما نسخة للعمل بموجبها عند اللزوم.</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p>Contract Date: <?php echo date('d/m/Y',strtotime($cval['issue_date']));?></p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">تاريخ العقد: <?php echo date('d/m/Y',strtotime($cval['issue_date']));?></p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p>Start Date: <?php echo date('d/m/Y',strtotime($cval['star_date']));?></p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">تاريخ البدء : <?php echo date('d/m/Y',strtotime($cval['star_date']));?></p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p>Name & Signature for Provider :</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">الإسم والتوقيع لمزود الخدمة :</p>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 letter-title">
  <p>Name & Signature for beneficiary:</p>
</div>
<div class="col-6 letter-title1">
  <p class="arabic">الإسم والتوقيع للمستفيد  :</p>
</div>
</div>
</div>
</div>
</td>
      </tr>
    </tbody>

    <tfoot>
      <tr>
        <td>
          <!--place holder for the fixed-position footer-->
          <div class="page-footer-space"></div>
        </td>
      </tr>
    </tfoot>

  </table>
<?php } ?>
</body>
<script type="text/javascript">
  window.print();
</script>
</html>

