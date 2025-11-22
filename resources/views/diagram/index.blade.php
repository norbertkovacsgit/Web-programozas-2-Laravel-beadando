@extends('layouts.app')

@section('title', 'Diagram')

@section('body_class', 'diagram-page')

@section('header')
<span class="icon solid fa-chart-bar"></span>
<h2>Diagram</h2>
<p>TOP 20 csapat helyezései.</p>
@endsection

@section('wrapper_class', 'style3 container special')

@section('head')
@parent
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .diagram-page .wrapper.style3.container.special {
        max-width: 90em;
        width: 100%;
        box-sizing: border-box;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .diagram-card {
        width: 100%;
        max-width: 100%;
        margin: 0 auto;
        padding: 1.5rem 1.5rem;
        background: #ffffff;
        border-radius: 6px;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.03);
        height: 460px;
    }

    .diagram-card canvas {
        width: 100% !important;
        height: 100% !important;
    }
</style>
@endsection

@section('content')
<div id="diagram-card"
    class="diagram-card"
    data-labels='@json($labels)'
    data-values='@json($data)'>
    <canvas id="teamBarChart"></canvas>
</div>
@endsection

@section('scripts')
<script>
    (function() {
        const wrapper = document.getElementById('diagram-card');
        if (!wrapper) return;

        const labels = JSON.parse(wrapper.dataset.labels || '[]');
        const values = JSON.parse(wrapper.dataset.values || '[]');

        const ctx = document.getElementById('teamBarChart').getContext('2d');

        const baseBg = [
            'rgba(99, 197, 184, 0.6)',
            'rgba(246, 178, 107, 0.6)',
            'rgba(111, 168, 220, 0.6)',
            'rgba(224, 102, 102, 0.6)',
            'rgba(142, 124, 195, 0.6)',
            'rgba(147, 196, 125, 0.6)',
            'rgba(255, 217, 102, 0.6)'
        ];
        const baseBorder = [
            'rgb(99, 197, 184)',
            'rgb(246, 178, 107)',
            'rgb(111, 168, 220)',
            'rgb(224, 102, 102)',
            'rgb(142, 124, 195)',
            'rgb(147, 196, 125)',
            'rgb(255, 217, 102)'
        ];

        const backgroundColor = labels.map((_, i) => baseBg[i % baseBg.length]);
        const borderColor = labels.map((_, i) => baseBorder[i % baseBorder.length]);

        const data = {
            labels: labels,
            datasets: [{
                label: 'Helyezések száma',
                data: values,
                backgroundColor: backgroundColor,
                borderColor: borderColor,
                borderWidth: 1,
                borderRadius: 4
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 0
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        },
                        title: {
                            display: true,
                            text: 'Helyezések száma'
                        }
                    },
                    x: {
                        ticks: {
                            maxRotation: 60,
                            minRotation: 45
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label(ctx) {
                                const team = ctx.label || '';
                                const value = ctx.parsed.y || 0;
                                return `${team}: ${value} helyezés`;
                            }
                        }
                    }
                }
            }
        };

        new Chart(ctx, config);
    })();
</script>
@endsection