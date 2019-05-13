require('./bootstrap.js')
import Echo from 'laravel-echo'


class Chat {
	constructor() {
		this.init()
	}

	init() {
		window.io = require('socket.io-client')

		window.Echo = new Echo({
			broadcaster: 'socket.io',
			host: window.location.hostname + ':6001'
		});
		this.config()
		this.listen()
	}

	config() {
		this.element = {
			btnChat: $("#btnChat"),
			messageContent: $("#messageContent"),
			messageList: $("#listMessage")
		}
		this.apiURL = location.href
	}

	listen() {
		this.submitMessage()
		this.broadCastMessage()
	}

	submitMessage() {
		let button = this.element.btnChat
		let message = this.element.messageContent
		let self = this
		button.on('click', function (event) {
			event.preventDefault()
			message.val()
			axios.post(
				self.apiURL,
				{content: message.val()}
			)

		})
	}

	broadCastMessage() {
		let list = this.element.messageList
		let self = this
		window.Echo.channel('chat').listen('SendMessage', (e)=> {
			let message = e.message.content
			list.append('<li>' + message + '</li>')
		})
	}
}

new Chat()
