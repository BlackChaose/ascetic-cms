/** 
View
TODO - возможно здесь нужен рекурсивный алгоритм чтения и конвертации... хз.
*/ 
$title="AsceticCMS"
doctype = 'html'
html(lang = 'ruRU')
    head
        meta(charset = 'utf-8')
        title = $title
        link(type="text/css" rel='stylesheet' href='styles.css')
    body
        header
            h1 = $title
        nav = MENU
        section = SECTION 1
        article = Article 1
        aside = Aside 1
        footer = Footer 1
        script(type="javascript" src="script.js")