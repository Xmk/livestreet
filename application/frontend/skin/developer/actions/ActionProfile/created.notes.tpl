{**
 * Список заметок созданных пользователем
 *}

{extends 'layouts/layout.user.tpl'}

{block 'layout_user_page_title'}
    {lang 'user.publications.title'}
{/block}

{block 'layout_content' append}
    {include 'navs/nav.user.created.tpl'}
    {include 'components/user/user-list.tpl' users=$aUsersList pagination=$aPaging}
{/block}