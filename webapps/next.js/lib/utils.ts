export function formatDate(input: string): string {
  const date = new Date(input)
  return date.toLocaleDateString("en-US", {
    month: "long",
    day: "numeric",
    year: "numeric",
  })
}

/* Divide input by 8 equal parts */
export function divide(input: number): number[] {
  const parts = []
  for (let i = 0; i < 8; i++) {
    parts.push(input / 8)
  }
  return parts
}

/* Load popcorn.js video and get length of video */
export function getVideoLength(url: string): Promise<number> {
  return new Promise((resolve, reject) => {
    const video = Popcorn.youtube({
      src: url,
      controls: false,
      autoplay: false,
      loop: false,
      preload: "auto",
      width: 0,
      height: 0,
    })
    video.on("loadedmetadata", () => {
      resolve(video.duration())
    })
  })
}

const divider = 8;
export function divideByDivider(input: number, divider: number): number[] {
  const parts = []
  for (let i = 0; i < divider; i++) {
    parts.push(input / divider)
  }
  return parts
}

const videoLength = await getVideoLength("https://www.youtube.com/watch?v=dQw4w9WgXcQ");
const videoStreamingParts = divideByDivider(videoLength, divider);

/* count half of sinus with each next iteration higher by the avarage of the previous half */
export function countSinus(input: number): number {
  const sinus = Math.sin(input)
  const half = sinus / 2
  return half
}
export function countSinus(length: number): number[] {
  const sinus = []
  for (let i = 0; i < length; i++) {
    sinus.push(Math.sin(i / length * 2 * Math.PI))
  }
  return sinus
}
