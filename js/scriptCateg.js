const dados = [{
    nome: 'Curtir uma Página',
    img: 'faceCurtirPagina.png',
    categ: 'Facebook'
},
{
    nome: 'Compartilhar uma Publicação',
    img: 'faceCompartilharPublicacao.png',
    categ: 'Facebook'
},
{
    nome: 'Trocar Foto de Perfil',
    img: 'faceTrocarFotoPerfil.png',
    categ: 'Facebook'
},
{
    nome: 'Chamada de Voz no WhatsApp',
    img: 'zapChamadaVoz.png',
    categ: 'WhatsApp'
    
},
{
    nome: 'Compartilhar uma Publicação',
    img: 'zapDeletarMensagem.png',
    categ: 'WhatsApp'
},
{
    nome: 'Compartilhar uma Publicação',
    img: 'zapDeletarMensagem.png',
    categ: 'WhatsApp'
},
{
    nome: 'Curtir uma Publicação',
    img: 'instaCurtirPublicacao.png',
    categ: 'Instagram'
},
{
    nome: 'Seguir uma Página',
    img: 'instaSeguirPagina.png',
    categ: 'Instagram'
}]

window.addEventListener('load', (event) => {
    const videos = formatVideos()
    var dataCateg = catchCateg()
  
    var divs = videos.map(video => 
      mountVideos(video, dataCateg)
    )
})

function mountVideos (video, dataCateg) {
/*<div class="col-lg-4 col-md-6 col-sm-12 col-12">
    <a href="#">
        <div class="card card-custom shadow-sm">
            <div class="imagem-categoria d-flex align-content-end flex-wrap">
                <div class="titulo">Como usar WhatsApp</div>
            </div>
        </div>
    </a>
</div>*/
    if(dataCateg.cat === video.categ) {
        var divCol = document.createElement('div')
        divCol.className = 'col-lg-4 col-md-6 col-sm-12 col-12'
    
        var ancora = document.createElement('a')
        ancora.href = '#'
        divCol.appendChild(ancora)

        var divCard = document.createElement('div')
        divCard.className = 'card card-custom shadow-sm'
        ancora.appendChild(divCard)

        var divImg = document.createElement('div')
        divImg.className = 'imagem-categoria d-flex align-content-end flex-wrap'
        var str = 'linear-gradient(to bottom, rgb(255, 255, 255), rgb(180, 180, 180)), url('
        str = str.concat(video.img)
        str = str.concat(')')
        divImg.style.backgroundImage = str
        divImg.style.backgroundSize = 'cover'
        divCard.appendChild(divImg)

        var divTitulo = document.createElement('div')
        divTitulo.className = 'titulo'
        divImg.appendChild(divTitulo)

        var titulo = document.createTextNode(video.nome)
        divTitulo.appendChild(titulo)
    
        var videos = document.getElementById('videos')
        videos.appendChild(divCol)
    }
}

function catchCateg() {
    var query = location.search.slice(1)
    var partes = query.split('&')
    var data = {}
    partes.forEach(function (parte) {
        var chaveValor = parte.split('=')
        var chave = chaveValor[0]
        var valor = chaveValor[1]
        data[chave] = valor
    })

    return data
}

function formatVideos() {
    let i = 0

    videos = []
  
    dados.map(x => (
        videos.push({
            id: i,
            nome: x.nome, 
            img: 'img/'.concat(x.img),
            categ: x.categ
        }),
        i++
    ))
    return videos
  }