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
            return ['comeBack','undo', 'redo', '|', 'bold', 'italic', 'del', 'hr', 'quote', '|', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '|', 'list-ul', 'list-ol', '|', 'fullscreen', 'info', 'watch', 'goto-line', '|', 'emoji', 'image', 'link', 'code-block', 'table', '|', 'dayAndNight', 'draft', 'summit','userIcon'];
        },
        toolbarIconTexts: {
            draft: '保存草稿',
            summit: '发布文章',
            dayAndNight: '切换日间/夜间模式',
            comeBack: "<i class='fa fa-arrow-left'></i><span>&nbsp;&nbsp;回到主页</span>",
            userIcon: userIconTag
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
                // alert('dddddddlakdsjf');
                let txt = editor.getMarkdown();
                $.post("./php/submitArticle.php", { article: txt }, function (data) {
                    alert(data);
                    if (data == 1) {
                        alert("submit successfully!");
                    } else {
                        alert("sumit failed!");
                    }
                });
            }
        }
    });

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