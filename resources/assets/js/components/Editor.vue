<template>
	<div>

		<div id="toolbar"></div>
		<div class="editor" style="height: 500px;"></div>
		
		<textarea name="body" style="display: none">{{ body }}</textarea>
	</div>
</template>

<script>
	import Quill from 'quill'

	export default {
		props: ['data'],
		data () {
			return {
				body: this.data,
				editor: null,
				options: {
  					modules: {
    					toolbar: true
  					},
  					placeholder: 'Compose an epic...',
  					readOnly: false,
  					theme: 'snow'
				}
			}
		},
		mounted () {
			this.setUpQuill()
		},
		methods: {
			setUpQuill () {

				// start quill
				this.editor = new Quill('.editor', this.options )

				// set old data into quill
				document.querySelector( '.ql-editor' ).innerHTML = this.body

				// set listener to react to changes
				this.editor.on( 'text-change', (delta, oldDelta, source) => {

					if ( source == 'user' ) {

						this.body = document.querySelector( '.ql-editor' ).innerHTML 

					}
				})
			}
		}
	}
</script>