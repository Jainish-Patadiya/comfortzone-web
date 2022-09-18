$(document).ready(function () {
  tinymce.init({
    selector: 'textarea',
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [
      { title: 'My page 1', value: 'https://www.tiny.cloud' },
      { title: 'My page 2', value: 'http://www.moxiecode.com' }
    ],
    image_list: [
      { title: 'My page 1', value: 'https://www.tiny.cloud' },
      { title: 'My page 2', value: 'http://www.moxiecode.com' }
    ],
    image_class_list: [
      { title: 'None', value: '' },
      { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    file_picker_callback: function (callback, value, meta) {
      if (meta.filetype == "image") {
        $("#upload").trigger("click");
        $("#upload").on("change", function () {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function (e) {
            callback(e.target.result, {
              alt: "",
            });
          };
          reader.readAsDataURL(file);
        });
      }
    },
    templates: [
          { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
      { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
      { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image imagetools table',

    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
   });
       
   });
   function admin_service(){
    let service_name = document.getElementById("page_content").value;
    let service_content = document.getElementById("page_content").innerHTML;
    
    if (service_name == "" || service_name == null) {
        swal("Please Fill out all feilds", "", "error");
        return false;
      }
      if (service_content == "" || service_content == null) {
        swal("Please Fill out all feilds", "", "error");
        return false;
      }
   }
   function static_page() {
    let page_name = document.getElementById("page_name").value;
    let page_content = document.getElementById("page_content").innerHTML;
  
    if (page_name == "" || page_name == null) {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
    if (page_content == "" || page_content == null) {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
  }

  function product_validate() {
    let category = document.getElementById("category").value;
    let price = document.getElementById("price").value;
    let prd_desc = document.getElementById("prd_desc").innerHTML;
    let prd_name = document.getElementById("prd_name").value;
    let mainlogo = document.getElementById("mainlogo").value;
    
    if (category == "") {
        swal("Please Fill out all feilds", "", "error");
        
      return false;
    }
    if (price == "") {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
    if (prd_desc == "") {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
    if (prd_name == "") {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
    if (mainlogo == "") {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
  }
    function testimonial(){
    let title = document.getElementById("title").value;
    let content = document.getElementById("content").innerHTML;
    let author = document.getElementById("author").value;
  
    if (title == "" || title == null) {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
    if (content == "" || content == null) {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
    if (author == "" || author == null) {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
    }
  function category_validation(){

    let cat_name = document.getElementById("category_name").value;
    let cat_title = document.getElementById("category_title").value;

    if (cat_name == "") {
        swal("Please Fill out all feilds", "", "error");
        return false;
    }
    if (cat_title == "") {
        swal("Please Fill out all feilds", "", "error");
        return false;
      }
  }

  function menu(){
    let menu_name=document.getElementById("menu_name").value;
    let position=document.getElementById("position").value;
        if(menu_name==""){
            swal("Please Fill out all feilds", "", "error");
            return false;
        }
        if(position==""){
            swal("Please Fill out all feilds", "", "error");
            return false;
        }
  }
  function signup() {
    let username = document.getElementById("user_name").value;
    let fname = document.getElementById("fname").value;
    let email = document.getElementById("email").value;
    let pswd = document.getElementById("pswd").value;
    let role = document.getElementById("role").value;
  
    if (username == "" || pswd == "" || email == "" || fname == "" || role=="") {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
  }

  function Validate_image(img) {
    console.log(img);
    console.log(img.value);
    let file_ext = img.value;
  
    let ext = file_ext.substring(file_ext.lastIndexOf(".") + 1);
    console.log(ext);
  
    let Image = /(jpg|png|jpeg)$/;
  
    if (Image.exec(ext)) {
  
      let filerdr = new FileReader();
        filerdr.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }
        filerdr.readAsDataURL(img.files[0]);
    } else {
      alert("Extension Not Allowed");
      img.value = "";
      return false;
    }
  }

  function update_logo(){
    let logo=document.getElementById('profile').value;
    if (logo == "" || logo == null) {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
  }
  function update_copyright(){
    let copyright=document.getElementById('copy-right').value;
    if (copyright == "" || copyright == null) {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
  }
  function update_title(){
    let title=document.getElementById('title').value;
    if (title == "" || title == null) {
      swal("Please Fill out all feilds", "", "error");
      return false;
    }
  }

  function login_form(){
    
    let uname=document.getElementById('uname').value;
    let password=document.getElementById('password').value; 
    
  
    if (uname == "" || uname == null) {
      swal("Please Fill Username", "", "error");
      return false;
    }
    if (password == "" || password == null) {
        swal("Please Fill Password", "", "error");
        return false;
    }
        
  }

  function change_pswd(){
    let new_password=document.getElementById('new_pass').value; 
    let pswd=document.getElementById('pswd').value; 
    let cpassword=document.getElementById('cpass').value; 
    
    if (pswd == "" || pswd == null) {
      swal("Please Fill Password", "", "error");
      return false;
    }

    if (new_password == "" || new_password == null) {
      swal("Please Fill Password", "", "error");
      return false;
    }
    if (cpassword == "" || cpassword == null) {
      swal("Please Fill Password", "", "error");
      return false;
    }
  }
  $(document).ready(function () {
    let date = new Date();
    let hours = date.getHours();
    console.log(hours)
  
    if (hours > 0 && hours < 12) {
      document.getElementById("greeting").innerHTML = "Good Morning,";
    }
  
    if (hours >= 12 && hours <= 16) {
      document.getElementById("greeting").innerHTML = "Good Afternoon,";
    }
  
    if (hours >= 16 && hours < 24) {
      document.getElementById("greeting").innerHTML = "Good Evening,";
    }
  });