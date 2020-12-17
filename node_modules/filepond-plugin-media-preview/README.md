# Media Preview plugin for FilePond (+PDF)

[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/nielsboogaard/filepond-plugin-media-preview/blob/master/LICENSE)

The Media Preview plugin will kick in automatically when the uploaded file is of type video or audio and render a preview player inside the file item. For pdf files it will use the PDF.js native renderer.

<img src="https://github.com/nielsboogaard/filepond-plugin-media-preview/blob/master/demo.gif?raw=true" width="508" alt=""/>

## Quick Start

Install using npm:

```bash
npm install ernestbrandi/filepond-plugin-media-preview
```

Then import in your project:

```js
import * as FilePond from "filepond";
import FilePondPluginMediaPreview from "filepond-plugin-media-preview";
```

Register the plugin:

```js
FilePond.registerPlugin(FilePondPluginMediaPreview);
```

Create a new FilePond instance as normal.

```js
const pond = FilePond.create({
  name: "filepond",
});

// Add it to the DOM
document.body.appendChild(pond.element);
```

The preview will become active when uploading an video or audio file.

## Default styles

Be sure to include this lib's styles, by importing the minified css.

```js
import "filepond-plugin-media-preview/dist/filepond-plugin-media-preview.min.css";
```

## Demo

[View the demo](https://ernestbrandi.github.io/filepond-plugin-media-preview/)
