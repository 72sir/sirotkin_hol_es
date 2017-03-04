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

            this.createLegend(containerMap);
        }

        private createLegend(container: JQuery): void {
            var legend = (<IUIComponent>ControlFactory.create(this.model.textView, this.expressionContextProvider));
            this.addChildComponent(legend, this);
            legend.render(container);
        }

        public refresh(container: HTMLElement) {
            // Empty
        }
    }
}
