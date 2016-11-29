<div id="map_canvas">
  {foreach from=$data item=reg}
    <pre>{$reg.text} ||
    {foreach from=$reg.entities.hashtags item=hash}
      {$hash.text} 
    {/foreach}
    </pre>
  {/foreach}
</div>
