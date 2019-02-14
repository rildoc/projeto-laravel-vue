// criar o mutations para atualizar o state
export default {
    // cria o LOAD_CMS para receber o state e o  cms
   LOAD_CONTEUDOS (state, conteudos) {
    // state recebe os items do  cms
     state.items = conteudos
   }
}
