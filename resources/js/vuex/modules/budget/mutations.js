// O mutation atualiza o state , e recebe os budgets
export default {
    LOAD_BUDGETS (state, budgets) {
        //  gerenciando o state items que recebe os budgets
        state.items = budgets
    }
}
