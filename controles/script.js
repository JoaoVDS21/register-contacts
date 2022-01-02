$(()=>{
    var texto = ""
    var inome
    var inumero
    var iemail

    $('#enviar').on('click', ()=>{
        inome = $('#nome').val()
        inumero = $('#numero').val()
        iemail = $('#email').val()
        if(inome && inumero && iemail){ // Verifica se as variáveis estão vazias
            $.ajax({
                method: 'POST',
                url: 'controles/processa.php',
                data: {op: '1', nome:inome, numero:inumero, email:iemail},
                success: data => {
                    listagem()
                    $('#form-control').addClass('hide')
                    $('#back-overlay').addClass('hide')
                    clearInputs();
                },
                error: data =>{
                    alert('Erro ao cadastrar');
                }
            })
        } else {
            alert('Campos vazios!')
        }
        
    })

    function listagem(){
        texto = "";
        var size = 0;
        $.ajax({
            method: 'POST',
            url: 'controles/processa.php',
            data: {op: '2'},
            success: data => {
                var obj = JSON.parse(data);
                $.each(obj, ()=>{
                    size++;
                })
                
                $.each(obj, (key, value) =>{
                    if(((key == (size - 1)) && (size == 1)) || (key == (size - 1)) && (localStorage.lastContact < key)){
                        texto += '<div class="contact-box hide">';
                    } else texto += '<div class="contact-box">';
                    texto += '<div class="img-icon"><i class="fas fa-user"></i></div>';
                    texto += '<div class="contact">';
                    texto += '<div class="title-user">ID de Usuário: ' + value.idcontato + '</div>';
                    texto += "Nome: " + value.nome + "<br>";
                    texto += "Número: " + value.numero + "<br>";
                    texto += "E-mail: " + value.email + "<br>";
                    texto += "</div>";
                    texto += "</div>";

                    if(key == (size - 1)){
                        localStorage.lastContact = key;
                    }

                    setTimeout(()=>{
                        $('.contact-box').removeClass('hide');
                    },400)
                })
                $('#conteudo').html(texto);
            },
            error: data => {
                alert(data)
            }
        })
    }

    function clearInputs(){
        $('#nome').val("") 
        $('#numero').val("") 
        $('#email').val("") 
    }

    $('#btn-cadastro').on('click', ()=>{
        $('#form-control').removeClass('hide')
        $('#back-overlay').removeClass('hide')
    })

    $('#btn-fechar').on('click', ()=>{
        $('#form-control').addClass('hide')
        $('#back-overlay').addClass('hide')
    })

    $(window).on('load', listagem)

})