{**
 * 
 *}

{extends 'components/user-list-add/item.tpl'}

{block 'user_list_add_item_actions' prepend}
    <li class="icon-repeat js-blog-invite-user-repeat" title="{$aLang.blog.invite.repeat}" data-user-id="{$userId}"></li>
{/block}