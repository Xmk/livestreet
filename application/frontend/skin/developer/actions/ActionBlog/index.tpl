{**
 * Список топиков
 *
 * @param array  $topics
 * @param array  $paging
 * @param string $periodSelectCurrent
 * @param string $periodSelectRoot
 *}

{extends 'layouts/layout.base.tpl'}

{block 'layout_options' append}
    {$sNav = 'topics'}
{/block}

{block 'layout_content'}
    {include 'components/topic/topic-list.tpl' topics=$topics paging=$paging}
{/block}