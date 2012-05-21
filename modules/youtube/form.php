<fieldset>
    <legend>YouTube</legend>
    <form name="youtube_load" method="post">
        <input type="hidden" name="module" value="youtube" />
        <div>
            <label for="youtubeurl">Play URL:</label> <input type="text" id="youtubeurl" name="youtubeurl" title="Paste YouTube URL here..." size="40" />
            <button name="action" type="submit" value="PLAY">PLAY</button>
        </div>
        <button name="action" type="submit" value="PAUSE">PAUSE/RESUME</button>
        <button name="action" type="submit" value="MUTE">MUTE</button>
        <button name="action" type="submit" value="UNMUTE">UNMUTE</button>
        <button name="action" type="submit" value="VOLUP">VOLUP</button>
        <button name="action" type="submit" value="VOLDOWN">VOLDOWN</button>
    </form>
</fieldset>
