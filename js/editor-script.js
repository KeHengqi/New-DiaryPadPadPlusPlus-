var dayNightMode = 0;
var userIconTag = '<img src="./img/user-default-icon.png" width="21" height="21" style="border-radius: 50%"></img>';
$(document).ready(function () {
    var editor = editormd('editor', {
        width: '100%',
        height: '100%',
        emoji: true,
        taskList: true,
        syncScrolling: true,
        path: 'editor.md/lib/',
        tex: false,
        searchRepace: true,
        htmlDecode: true,
        htmlDecode: 'center,br,sup,sub,img,iframe|*',
        pageBreak: true,
        gotoLine: true,
        placeholder: 'Enjoy Writing in DiaryPad...',
        toolbarIcons: function () {
            return ['comeBack','undo', 'redo', 'bold', 'italic', 'del', 'hr', 'quote', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'list-ul', 'list-ol', 'info', 'watch', 'goto-line', 'emoji', 'image', 'link', 'code-block', 'table', '||','showTitle','dayAndNight','editTitle', 'summit'];
        },
        toolbarIconTexts: {
            summit: 'Submit blog',
            dayAndNight: 'Day/night mode',
            comeBack: "<i class='fa fa-arrow-left'></i><span>&nbsp;&nbsp;back to main page</span>",
            editTitle: "<span class='modal-trigger' href='#modal1' id='edit-title-button'>Edit title</span>",
            // titleIntput: "<span>Title&nbsp;:&emsp;</span><input type='text' style=''>",
            userIcon: userIconTag,
            showTitle: "<span id='show-title'></span>"
        },
        toolbarHandlers: {
            dayAndNight: function () {
                console.log('dayNightMode = ' + dayNightMode);
                if (dayNightMode % 2 == 0) {
                    console.log('here');
                    editor.setTheme('dark');
                    editor.setEditorTheme('lesser-dark');
                    editor.setPreviewTheme('dark');
                } else {
                    editor.setTheme('default');
                    editor.setEditorTheme('default');
                    editor.setPreviewTheme('default');
                }
                dayNightMode++;
                // alert('debug');
            },
            comeBack: function(){
                window.location.href = './main-page.html'
            },
            summit: function () {
                let articleTitle = document.querySelector('#title-box').value;
                if(articleTitle == "" || articleTitle === null) {
                    alert('The title cannot be empty! Click the \"Edit title\" button to input your article title.');
                    return ;
                }
                let txt = editor.getMarkdown();
                if(txt == '' || txt == null) {
                    alert('Sorry, you cannot submit empty article!');
                    return ;
                }
                let title = document.querySelector('#show-title').innerText;
                // console.log('asdfas:' + title);
                
                $.post("./php/submitArticle.php", { article: txt, title: title }, function (data) {
                   // alert(data);
                    if (data == 1) {
                        alert("submit successfully!");
                    } else {
                        alert("sumit failed!");
                    }
                });
            },
            editTitle: function () {
                $('#modal1').modal('open');
            }
        }
    });

    $('.modal').modal('open');

    editormd.katexURL = {
        js: './katex/katex.min',
        css: './katex/katex.min'
    };

    editormd.emoji = {
        // path: './emoji/',
        path: 'http://www.webpagefx.com/tools/emoji-cheat-sheet/graphics/emojis/',
        ext: '.png'
    }

    $('#editormd-theme-select').change(function () {
        let toolbar_theme = $(this).find('option:selected').text();
        //console.log($(this).find('option:selected').text());
        editor.setTheme(toolbar_theme);
    });

    $('#editor-area-theme-select').change(function () {
        let edit_area_theme = $(this).find('option:selected').text();
        editor.setEditorTheme(edit_area_theme);
    });

    $('#preview-area-theme-select').change(function () {
        let preview_area_theme = $(this).find('option:selected').text();
        editor.setPreviewTheme(preview_area_theme);
    });

    
});