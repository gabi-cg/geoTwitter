<div id="response">
  {if isset($data) && $data != null}
    {foreach from=$data item=reg}
      <p>{$reg}</p>
    {/foreach}
  {/if}
</div>
