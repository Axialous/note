const texteanim = document.querySelector('.logo-anim');
new Typewriter(texteanim,{
    deleteSpeed:30,
    loop:true
})
.typeString('Une note pour: <strong>Vivre</strong>')
.pauseFor( 300)
.deleteChars(5)
.typeString('<strong>Rêver</strong>')
.pauseFor( 300)
.deleteChars(5)
.typeString('<strong>Aimer</strong>')
.pauseFor( 300)
.deleteChars(5)
.typeString('<strong>S\'évader</strong>')
.pauseFor( 3000)

.start()