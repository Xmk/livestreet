{**
 * Страница входа
 *}

{extends 'layouts/layout.base.tpl'}

{block 'layout_options' append}
    {$layoutShowSidebar = false}
{/block}

{block 'layout_page_title'}
    {$aLang.auth.login.title}
{/block}

{block 'layout_content'}
    {include 'components/auth/auth.login.tpl' showExtra=true}
{/block}