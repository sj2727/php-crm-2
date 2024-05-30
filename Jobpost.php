
<div class="sect">
     <div class="title">
       Resumes
    </div>
<form action="post.php" method="POST" enctype='multipart/form-data'>
        <div class="input">
        <lable for="name">NAME</lable>
        <input type="text" name="name" style="display:block;">
        </div><div class="input">
        <lable for="email">EMAIL</lable>
        <input type="email" name="email" style="display:block;">
        </div><div class="input">
        <lable for="phone">PHONE NO</lable>
        <input type="text" name="phone" style="display:block;">
        </div><div class="input">
        <lable for="role">POST FOR APPLY</lable>
        <select name="role" style="display:block;">
        <option value="BPO">BPO</option>
        <option value="KPO">KPO</option>
        </select>
        </div>
         <div class='input'>
                <label for="name">RESUME (PDF/Word)</label>
                <label class="file">
                    <input type="file" id="file" name="file" aria-label="File browser example">
                    <span class="file-custom"> <span id="img-name"> </span> <i class="fa-solid fa-upload"></i> Browse</span>
                </label>
        </div>
        <div class="buttons">
            <button class="btn submit" id="submit">Submit</button>
        </div>
        </form>
</div>

<link rel="stylesheet" href="css/theme.css">
<link rel="stylesheet" href="asset/css/csv.css">
<style>
form {
    display: flex;
    gap: 20px;
    padding: 20px;
    flex-wrap: wrap;
    flex-direction: column;
    font-family: 'Roboto', sans-serif;
}
input, select, textarea {
    width: 100%;
    height: 40px;
    border-radius: 4px;
    border: 1px solid silver;
    padding: 2px 20px;
    font-size: 16px;
    font-family: 'Roboto', sans-serif;
}
span.file-custom {
    width: 250px;
}
    input[type="file"] {
    margin-bottom: 0;
}
span.file-custom {
    top: -31px;
    
}
</style>
<script src="js/jquery.js"></script>  
<script src="js/resume.js"></script>