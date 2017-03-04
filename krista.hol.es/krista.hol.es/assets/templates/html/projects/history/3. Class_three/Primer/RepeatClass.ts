declare module WebReports.Model.Primer {
    export interface RepeatClass extends Control {
        textView: Text;
    }
}
module WebReports.Controls.Primer {
    export class RepeatClass extends UIComponent {
        protected expressionContextProvider: IExpressionContextProvider;
        constructor(private  model: WebReports.Model.Primer.RepeatClass, args: any) {
            super();
            this.expressionContextProvider = <IExpressionContextProvider>args[0];
        }
        public render(container: HTMLElement) {
            var containerMap = $("<div>")
                .attr("id", "containerMap")
                .appendTo(container);
            let classOne = Utils.Class.CommonClass(10000, 1);
            $(containerMap).append("<div class='text-control'>"  +  classOne + " </div>");
        }
        public refresh(container: HTMLElement) {
            // Empty
        }
    }
}
