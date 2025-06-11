{extends file='layout.tpl'}

{block name='content'}
<table class="min-w-full border-collapse">
    <thead>
        <tr>
            <th class="border p-2 text-left">ID</th>
            <th class="border p-2 text-left">Name</th>
            <th class="border p-2 text-left">Serial</th>
            <th class="border p-2 text-left">Status</th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$items item=it}
        <tr>
            <td class="border p-2">{$it.id}</td>
            <td class="border p-2">{$it.name}</td>
            <td class="border p-2">{$it.serial_number}</td>
            <td class="border p-2">{$it.status}</td>
        </tr>
    {/foreach}
    </tbody>
</table>
{/block}
