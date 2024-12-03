import React, { useState } from "react";
import YouTube from "react-youtube";

const YTEmbed = ({ videoId, className = 'absolute inset-0 size-full' }) => {
  const [playing, setPlaying] = useState(false);
  const [player, setPlayer] = useState(null)

  const opts = {
    height: "100%",
    width: "100%",
    playerVars: {
      autoplay: 0,
      controls: 0,
    },
  };

  const onPlay = () => {
    if (playing) {
      player.pauseVideo();
    } else {
      player.playVideo();
    }
    setPlaying(!playing);
  };

  console.log(className)

  return (
    <section className={className}>
      <YouTube
        videoId={videoId}
        className='size-full'
        onPause={e => setPlaying(false)}
        opts={opts}
        onReady={(event) => {
          setPlayer(event.target)
        }}
      />
      {!playing && (
        <div className="size-full">
          <img
            src={`https://i.ytimg.com/vi/${videoId}/hq720.jpg`}
            className="size-full border-0 object-cover object-center absolute top-0 left-0"
          />
          <button className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 border-4 border-rose-700 rounded-full bg-white pt-1.5 pl-1 cursor-pointer" onClick={onPlay}>
            <i className="fa fa-play text-2xl text-rose-700"></i>
          </button>
        </div>
      )}
    </section>
  );
};

export default YTEmbed;
